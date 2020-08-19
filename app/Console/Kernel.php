<?php

namespace VanguardDK\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use VanguardDK\Game;
use VanguardDK\User;
use VanguardDK\BotGame;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
       //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
		$schedule->command('coinpayment:transaction-check')
            ->everyMinute();
			
		$crontask = '*/'. intval(settings('bots_time')) .' * * * *';
								
		$schedule->call(function () {
			
			$logins = [];	
			
			$bets = [];
			$wins = [];
			
			//bets
			$tmp = explode(',', settings('bots_bet'));
			foreach($tmp AS $item){
				$item = trim($item);
				if( $item ){
					$bets[] = $item;					
				}
			}
			
			//wins			
			$tmp = explode(',', settings('bots_win'));
			foreach($tmp AS $item){
				$item = trim($item);
				if( $item ){
					$wins[] = $item;					
				}
			}
			
			$tmp = explode(',', settings('bots_login'));
			foreach($tmp AS $item){
				$item = trim($item);
				if( $item ){
					$logins[] = $item;					
				}
			}
							
			$games = Game::where('view', 1)->pluck('id')->toArray();
						
			if( count($logins) > 0 && count($games) > 0 ){
				
				BotGame::where('id', '>', 0)->delete();
				
				foreach($games AS $game_id){
					$login = $logins[rand(0, count($logins)-1)];
					$win = $wins[rand(0, count($wins)-1)];
					$bet = $bets[rand(0, count($bets)-1)];
										
					$current_timestamp = time();
					$before_timestamp = time() - intval(settings('bots_time')) * 60;
					$rand_timestamp = rand($before_timestamp, $current_timestamp);
					$date = date('H:i:s', $rand_timestamp);
					
					BotGame::create(['game_id' => $game_id, 'login' => $login, 'win' => $win, 'bet' => $bet, 'date_time' => $date]);
				}
			}
			
			
            
        })->cron($crontask);
			
//        $schedule->command('inspire')
//                 ->hourly();
    }


    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
