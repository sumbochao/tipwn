<?php

namespace VanguardDK\Lib;

use VanguardDK\Transaction;

class Level {    
    public function addPoints($user, $sum) {      
		$this->add($user, $sum);		
    }    
	
	function add( $user, $sum ){
				
		$left = $user->left_next_level();
		$nextLevel = false;
						
		if( $left <= $sum && $left > 0 ){
			$toAdd = $left;
			$toNextStep = $sum - $left;
			$nextLevel = true;
		} else{
			$toAdd = $sum;
			$toNextStep = 0;
		}
				
		$user->increment('points', floatval($user->point->pay) * $toAdd);
		$user->increment('total_balance', $toAdd);
				
		
		if($nextLevel){
			$user->increment('rating');
			$user = $user->fresh();
			$user->increment('balance', $user->point->bonus);
			$user = $user->fresh();
			Transaction::create([ 'user_id' => $user->id, 'summ' => $user->point->bonus, 'system' => 'Points ' . $user->point->name ]);
		}
				
		if($toNextStep > 0){
			$this->add( $user, $toNextStep );
		}
		
	}
}