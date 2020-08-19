<?php 
namespace VanguardDK\Games\BurningHeart5EGT;

use VanguardDK\Lib\LicenseDK;

class Server
{
    public function get($request, $game)
    {
        $checked = new LicenseDK();
        $license_notifications_array = $checked->aplVerifyLicenseDK(null, 0);
        if( $license_notifications_array["notification_case"] != "notification_license_ok" ) 
        {
            $response = "{\"responseEvent\":\"error\",\"responseType\":\"error\",\"serverResponse\":\"Error LicenseDK\"}";
            exit( $response );
        }
        $userId = Auth::id();
        $slotSettings = new SlotSettings($game, $userId);
        $_obf_0D19123324253D02380C3D242A043B0807071F213E2822 = json_decode(trim(file_get_contents("php://input")), true);
        $_obf_0D1A01320D0F3F2238312A1614230C3C3D24142A161A01 = sprintf("%01.2f", $slotSettings->GetBalance()) * 100;
        $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01 = [];
        $_obf_0D1A3C1F3E0F231B33113E3726041B393B370939042F32 = "";
        if( $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["command"] == "bet" && $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["bet"]["gameCommand"] == "collect" ) 
        {
            $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["command"] = "collect";
        }
        if( $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["command"] == "bet" && $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["bet"]["gameCommand"] == "gamble" ) 
        {
            $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["command"] = "gamble";
        }
        if( $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["command"] == "bet" && $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["bet"]["gameCommand"] == "jackpot" ) 
        {
            $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["command"] = "jackpot";
        }
        $_obf_0D1A3C1F3E0F231B33113E3726041B393B370939042F32 = (string)$_obf_0D19123324253D02380C3D242A043B0807071F213E2822["command"];
        switch( $_obf_0D1A3C1F3E0F231B33113E3726041B393B370939042F32 ) 
        {
            case "login":
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"playerName\":\"Demo Player - 1563864350676\",\"balance\":" . $_obf_0D1A01320D0F3F2238312A1614230C3C3D24142A161A01 . ",\"currency\":\"usd1\",\"languages\":[\"en\",\"bg\",\"it\",\"es\",\"go\",\"ru\",\"fr\",\"ro\"],\"groups\":[\"all\",\"cards\",\"classic\",\"diceSlots\",\"extraline\",\"fruit\",\"keno\",\"multiline\",\"roulette\",\"myGames\"],\"showRtp\":false,\"multigame\":true,\"sendTotalsInfo\":false,\"complex\":{\"CDJSlot\":[{\"gameIdentificationNumber\":521,\"recovery\":\"norecovery\",\"gameName\":\"Caramel Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":136,\"name\":\"all\"},{\"order\":14,\"name\":\"diceSlots\"},{\"order\":136,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"ZWJSlot\":[{\"gameIdentificationNumber\":807,\"recovery\":\"norecovery\",\"gameName\":\"Zodiac Wheel\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":19,\"name\":\"all\"},{\"order\":1,\"name\":\"classic\"},{\"order\":19,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TSHJSlot\":[{\"gameIdentificationNumber\":803,\"recovery\":\"norecovery\",\"gameName\":\"20 Super Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":10,\"name\":\"all\"},{\"order\":6,\"name\":\"fruit\"},{\"order\":10,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"ARJSlot\":[{\"gameIdentificationNumber\":520,\"recovery\":\"norecovery\",\"gameName\":\"Almighty Ramses II\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":102,\"name\":\"all\"},{\"order\":23,\"name\":\"multiline\"},{\"order\":102,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"IGTJSlot\":[{\"gameIdentificationNumber\":865,\"recovery\":\"norecovery\",\"gameName\":\"Inca Gold II\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":97,\"name\":\"all\"},{\"order\":20,\"name\":\"multiline\"},{\"order\":97,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FBDJSlot\":[{\"gameIdentificationNumber\":536,\"recovery\":\"norecovery\",\"gameName\":\"40 Burning Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":138,\"name\":\"all\"},{\"order\":16,\"name\":\"diceSlots\"},{\"order\":138,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TDRJSlot\":[{\"gameIdentificationNumber\":882,\"recovery\":\"norecovery\",\"gameName\":\"2 Dragons\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":75,\"name\":\"all\"},{\"order\":15,\"name\":\"classic\"},{\"order\":75,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"CMJSlot\":[{\"gameIdentificationNumber\":850,\"recovery\":\"norecovery\",\"gameName\":\"Casino Mania\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":106,\"name\":\"all\"},{\"order\":26,\"name\":\"classic\"},{\"order\":106,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"APJSlot\":[{\"gameIdentificationNumber\":884,\"recovery\":\"norecovery\",\"gameName\":\"Aloha Party\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":57,\"name\":\"all\"},{\"order\":8,\"name\":\"extraline\"},{\"order\":57,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FOKBJPoker\":[{\"gameIdentificationNumber\":20210,\"recovery\":\"norecovery\",\"gameName\":\"Four of a Kind Bonus Poker\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":121,\"name\":\"all\"},{\"order\":2,\"name\":\"cards\"},{\"order\":121,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"RWJSlot\":[{\"gameIdentificationNumber\":899,\"recovery\":\"norecovery\",\"gameName\":\"Rich World\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":61,\"name\":\"all\"},{\"order\":5,\"name\":\"multiline\"},{\"order\":61,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FRSJSlot\":[{\"gameIdentificationNumber\":853,\"recovery\":\"norecovery\",\"gameName\":\"Frog Story\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":25,\"name\":\"all\"},{\"order\":2,\"name\":\"multiline\"},{\"order\":25,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"Roulette\":[{\"subscriberName\":\"Roulette\",\"automatic\":true,\"flashVideoStream\":\"rtmp://video.egtmgs.com/live\",\"flashVideoSdp\":\"house-rlt03\",\"rouletteCycleInterval\":24,\"gameNumber\":\"\",\"denomination\":100,\"casinoName\":\"EGT\",\"playerBet\":{},\"rouletteType\":\"AUTOMATIC\",\"gameIdentificationNumber\":20201,\"recovery\":\"norecovery\",\"gameName\":\"EGT Roulette\",\"featured\":false,\"mlmJackpot\":false,\"totalBet\":0,\"groups\":[{\"order\":2,\"name\":\"all\"},{\"order\":2,\"name\":\"roulette\"},{\"order\":2,\"name\":\"myGames\"}]}],\"TBJJSlot\":[{\"gameIdentificationNumber\":513,\"recovery\":\"norecovery\",\"gameName\":\"The Big Journey\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":78,\"name\":\"all\"},{\"order\":17,\"name\":\"classic\"},{\"order\":78,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"CIJSlot\":[{\"gameIdentificationNumber\":514,\"recovery\":\"norecovery\",\"gameName\":\"Coral Island\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":73,\"name\":\"all\"},{\"order\":13,\"name\":\"classic\"},{\"order\":73,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"UHJSlot\":[{\"gameIdentificationNumber\":802,\"recovery\":\"norecovery\",\"gameName\":\"Ultimate Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":17,\"name\":\"all\"},{\"order\":13,\"name\":\"fruit\"},{\"order\":17,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"WHJSlot\":[{\"gameIdentificationNumber\":523,\"recovery\":\"norecovery\",\"gameName\":\"Wonderheart\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":56,\"name\":\"all\"},{\"order\":4,\"name\":\"multiline\"},{\"order\":56,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"XSJSlot\":[{\"gameIdentificationNumber\":822,\"recovery\":\"norecovery\",\"gameName\":\"Extra Stars\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":24,\"name\":\"all\"},{\"order\":17,\"name\":\"fruit\"},{\"order\":24,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"LADJSlot\":[{\"gameIdentificationNumber\":515,\"recovery\":\"norecovery\",\"gameName\":\"Like a Diamond\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":114,\"name\":\"all\"},{\"order\":28,\"name\":\"classic\"},{\"order\":114,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FHJSlot\":[{\"gameIdentificationNumber\":805,\"recovery\":\"norecovery\",\"gameName\":\"Flaming Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":12,\"name\":\"all\"},{\"order\":8,\"name\":\"fruit\"},{\"order\":12,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"KGJSlot\":[{\"gameIdentificationNumber\":846,\"recovery\":\"norecovery\",\"gameName\":\"Kashmir Gold\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":91,\"name\":\"all\"},{\"order\":16,\"name\":\"multiline\"},{\"order\":91,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TSOAJSlot\":[{\"gameIdentificationNumber\":896,\"recovery\":\"norecovery\",\"gameName\":\"The Story of Alexander\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":43,\"name\":\"all\"},{\"order\":5,\"name\":\"extraline\"},{\"order\":43,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FHSJSlot\":[{\"gameIdentificationNumber\":879,\"recovery\":\"norecovery\",\"gameName\":\"50 Horses\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":67,\"name\":\"all\"},{\"order\":10,\"name\":\"extraline\"},{\"order\":67,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"GOLJSlot\":[{\"gameIdentificationNumber\":823,\"recovery\":\"norecovery\",\"gameName\":\"Game of Luck\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":53,\"name\":\"all\"},{\"order\":8,\"name\":\"classic\"},{\"order\":53,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"SDJSlot\":[{\"gameIdentificationNumber\":20224,\"recovery\":\"norecovery\",\"gameName\":\"Supreme Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":126,\"name\":\"all\"},{\"order\":4,\"name\":\"diceSlots\"},{\"order\":126,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"RMJSlot\":[{\"gameIdentificationNumber\":504,\"recovery\":\"norecovery\",\"gameName\":\"Route of Mexico\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":72,\"name\":\"all\"},{\"order\":11,\"name\":\"multiline\"},{\"order\":72,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"QORJSlot\":[{\"gameIdentificationNumber\":512,\"recovery\":\"norecovery\",\"gameName\":\"Queen of Rio\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":86,\"name\":\"all\"},{\"order\":22,\"name\":\"classic\"},{\"order\":86,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FMJSlot\":[{\"gameIdentificationNumber\":501,\"recovery\":\"norecovery\",\"gameName\":\"Fast Money\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":87,\"name\":\"all\"},{\"order\":23,\"name\":\"classic\"},{\"order\":87,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"HDJSlot\":[{\"gameIdentificationNumber\":893,\"recovery\":\"norecovery\",\"gameName\":\"100 Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":133,\"name\":\"all\"},{\"order\":11,\"name\":\"diceSlots\"},{\"order\":133,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TEJSlot\":[{\"gameIdentificationNumber\":834,\"recovery\":\"norecovery\",\"gameName\":\"The Explorers\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":107,\"name\":\"all\"},{\"order\":26,\"name\":\"multiline\"},{\"order\":107,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"IDJSlot\":[{\"gameIdentificationNumber\":867,\"recovery\":\"norecovery\",\"gameName\":\"Ice Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":141,\"name\":\"all\"},{\"order\":19,\"name\":\"diceSlots\"},{\"order\":141,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"GEJSlot\":[{\"gameIdentificationNumber\":864,\"recovery\":\"norecovery\",\"gameName\":\"Great Empire\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":71,\"name\":\"all\"},{\"order\":12,\"name\":\"classic\"},{\"order\":71,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TWWJSlot\":[{\"gameIdentificationNumber\":863,\"recovery\":\"norecovery\",\"gameName\":\"The White Wolf\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":82,\"name\":\"all\"},{\"order\":19,\"name\":\"classic\"},{\"order\":82,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FBHTJSlot\":[{\"gameIdentificationNumber\":532,\"recovery\":\"norecovery\",\"gameName\":\"5 Burning Heart\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":26,\"name\":\"all\"},{\"order\":18,\"name\":\"fruit\"},{\"order\":26,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"HSHJSlot\":[{\"gameIdentificationNumber\":527,\"recovery\":\"norecovery\",\"gameName\":\"100 Super Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":11,\"name\":\"all\"},{\"order\":7,\"name\":\"fruit\"},{\"order\":11,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FBJSlot\":[{\"gameIdentificationNumber\":835,\"recovery\":\"norecovery\",\"gameName\":\"Forest Band\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":79,\"name\":\"all\"},{\"order\":13,\"name\":\"multiline\"},{\"order\":79,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"NDJSlot\":[{\"gameIdentificationNumber\":861,\"recovery\":\"norecovery\",\"gameName\":\"Neon Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":137,\"name\":\"all\"},{\"order\":15,\"name\":\"diceSlots\"},{\"order\":137,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"ORJSlot\":[{\"gameIdentificationNumber\":839,\"recovery\":\"norecovery\",\"gameName\":\"Ocean Rush\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":99,\"name\":\"all\"},{\"order\":21,\"name\":\"multiline\"},{\"order\":99,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"ABJSlot\":[{\"gameIdentificationNumber\":859,\"recovery\":\"norecovery\",\"gameName\":\"Amazon\\u0027s Battle\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":21,\"name\":\"all\"},{\"order\":1,\"name\":\"extraline\"},{\"order\":21,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"KLJSlot\":[{\"gameIdentificationNumber\":836,\"recovery\":\"norecovery\",\"gameName\":\"Kangaroo Land\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":77,\"name\":\"all\"},{\"order\":12,\"name\":\"multiline\"},{\"order\":77,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FURJSlot\":[{\"gameIdentificationNumber\":531,\"recovery\":\"norecovery\",\"gameName\":\"40 Ultra Respin\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":98,\"name\":\"all\"},{\"order\":36,\"name\":\"fruit\"},{\"order\":98,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"GOCJSlot\":[{\"gameIdentificationNumber\":817,\"recovery\":\"norecovery\",\"gameName\":\"Grace of Cleopatra\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":54,\"name\":\"all\"},{\"order\":9,\"name\":\"classic\"},{\"order\":54,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FSJSlot\":[{\"gameIdentificationNumber\":820,\"recovery\":\"norecovery\",\"gameName\":\"Fortune Spells\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":65,\"name\":\"all\"},{\"order\":11,\"name\":\"classic\"},{\"order\":65,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"IMDJSlot\":[{\"gameIdentificationNumber\":874,\"recovery\":\"norecovery\",\"gameName\":\"Imperial Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":142,\"name\":\"all\"},{\"order\":20,\"name\":\"diceSlots\"},{\"order\":142,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TBDJSlot\":[{\"gameIdentificationNumber\":537,\"recovery\":\"norecovery\",\"gameName\":\"20 Burning Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":139,\"name\":\"all\"},{\"order\":17,\"name\":\"diceSlots\"},{\"order\":139,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"SHJSlot\":[{\"gameIdentificationNumber\":821,\"recovery\":\"norecovery\",\"gameName\":\"Supreme Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":14,\"name\":\"all\"},{\"order\":10,\"name\":\"fruit\"},{\"order\":14,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"OCJSlot\":[{\"gameIdentificationNumber\":848,\"recovery\":\"norecovery\",\"gameName\":\"Oil Company II\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":55,\"name\":\"all\"},{\"order\":7,\"name\":\"extraline\"},{\"order\":55,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TDJSlot\":[{\"gameIdentificationNumber\":854,\"recovery\":\"norecovery\",\"gameName\":\"20 Diamonds\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":29,\"name\":\"all\"},{\"order\":3,\"name\":\"classic\"},{\"order\":29,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"SBJSlot\":[{\"gameIdentificationNumber\":855,\"recovery\":\"norecovery\",\"gameName\":\"Summer Bliss\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":94,\"name\":\"all\"},{\"order\":17,\"name\":\"multiline\"},{\"order\":94,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"GAJSlot\":[{\"gameIdentificationNumber\":837,\"recovery\":\"norecovery\",\"gameName\":\"Great Adventure\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":90,\"name\":\"all\"},{\"order\":15,\"name\":\"multiline\"},{\"order\":90,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"THBJSlot\":[{\"gameIdentificationNumber\":558,\"recovery\":\"norecovery\",\"gameName\":\"20 Hot Blast\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":6,\"name\":\"all\"},{\"order\":2,\"name\":\"fruit\"},{\"order\":6,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TBHTJSlot\":[{\"gameIdentificationNumber\":533,\"recovery\":\"norecovery\",\"gameName\":\"10 Burning Heart\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":27,\"name\":\"all\"},{\"order\":19,\"name\":\"fruit\"},{\"order\":27,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FSDJSlot\":[{\"gameIdentificationNumber\":20221,\"recovery\":\"norecovery\",\"gameName\":\"40 Super Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":124,\"name\":\"all\"},{\"order\":2,\"name\":\"diceSlots\"},{\"order\":124,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"RDJSlot\":[{\"gameIdentificationNumber\":860,\"recovery\":\"norecovery\",\"gameName\":\"Rolling Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":144,\"name\":\"all\"},{\"order\":22,\"name\":\"diceSlots\"},{\"order\":144,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"STJSlot\":[{\"gameIdentificationNumber\":897,\"recovery\":\"norecovery\",\"gameName\":\"Super 20\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":47,\"name\":\"all\"},{\"order\":32,\"name\":\"fruit\"},{\"order\":47,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"HCJSlot\":[{\"gameIdentificationNumber\":847,\"recovery\":\"norecovery\",\"gameName\":\"100 Cats\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":35,\"name\":\"all\"},{\"order\":3,\"name\":\"extraline\"},{\"order\":35,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"RLTJSlot\":[{\"gameIdentificationNumber\":550,\"recovery\":\"norecovery\",\"gameName\":\"Virtual Roulette\",\"featured\":true,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":1,\"name\":\"all\"},{\"order\":1,\"name\":\"roulette\"},{\"order\":1,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"VGJSlot\":[{\"gameIdentificationNumber\":818,\"recovery\":\"norecovery\",\"gameName\":\"Versailles Gold\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":50,\"name\":\"all\"},{\"order\":5,\"name\":\"classic\"},{\"order\":50,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TSOLJSlot\":[{\"gameIdentificationNumber\":873,\"recovery\":\"norecovery\",\"gameName\":\"The Secrets of London\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":105,\"name\":\"all\"},{\"order\":25,\"name\":\"multiline\"},{\"order\":105,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"BCJSlot\":[{\"gameIdentificationNumber\":525,\"recovery\":\"norecovery\",\"gameName\":\"Brave Cat\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":80,\"name\":\"all\"},{\"order\":11,\"name\":\"extraline\"},{\"order\":80,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"WCJSlot\":[{\"gameIdentificationNumber\":815,\"recovery\":\"norecovery\",\"gameName\":\"Witches Charm\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":83,\"name\":\"all\"},{\"order\":20,\"name\":\"classic\"},{\"order\":83,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"DQJSlot\":[{\"gameIdentificationNumber\":858,\"recovery\":\"norecovery\",\"gameName\":\"Dark Queen\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":95,\"name\":\"all\"},{\"order\":18,\"name\":\"multiline\"},{\"order\":95,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FMCJSlot\":[{\"gameIdentificationNumber\":547,\"recovery\":\"norecovery\",\"gameName\":\"40 Mega Clover\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":30,\"name\":\"all\"},{\"order\":20,\"name\":\"fruit\"},{\"order\":30,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"RORJSlot\":[{\"gameIdentificationNumber\":806,\"recovery\":\"norecovery\",\"gameName\":\"Rise of Ra\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":28,\"name\":\"all\"},{\"order\":2,\"name\":\"classic\"},{\"order\":28,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"RSJSlot\":[{\"gameIdentificationNumber\":809,\"recovery\":\"norecovery\",\"gameName\":\"Royal Secrets\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":38,\"name\":\"all\"},{\"order\":4,\"name\":\"classic\"},{\"order\":38,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"HSDJSlot\":[{\"gameIdentificationNumber\":534,\"recovery\":\"norecovery\",\"gameName\":\"100 Super Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":125,\"name\":\"all\"},{\"order\":3,\"name\":\"diceSlots\"},{\"order\":125,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"DGRJSlot\":[{\"gameIdentificationNumber\":508,\"recovery\":\"norecovery\",\"gameName\":\"Dragon Reborn\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":109,\"name\":\"all\"},{\"order\":27,\"name\":\"multiline\"},{\"order\":109,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"SCHJSlot\":[{\"gameIdentificationNumber\":517,\"recovery\":\"norecovery\",\"gameName\":\"Sweet Cheese\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":117,\"name\":\"all\"},{\"order\":31,\"name\":\"multiline\"},{\"order\":117,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FDJSlot\":[{\"gameIdentificationNumber\":509,\"recovery\":\"norecovery\",\"gameName\":\"Flaming Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":135,\"name\":\"all\"},{\"order\":13,\"name\":\"diceSlots\"},{\"order\":135,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"THDJSlot\":[{\"gameIdentificationNumber\":507,\"recovery\":\"norecovery\",\"gameName\":\"Thumbelina Dream\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":116,\"name\":\"all\"},{\"order\":16,\"name\":\"extraline\"},{\"order\":116,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TSFJSlot\":[{\"gameIdentificationNumber\":528,\"recovery\":\"norecovery\",\"gameName\":\"30 Spicy Fruits\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":18,\"name\":\"all\"},{\"order\":14,\"name\":\"fruit\"},{\"order\":18,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FDHJSlot\":[{\"gameIdentificationNumber\":810,\"recovery\":\"norecovery\",\"gameName\":\"5 Dazzling Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":15,\"name\":\"all\"},{\"order\":11,\"name\":\"fruit\"},{\"order\":15,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"RQJSlot\":[{\"gameIdentificationNumber\":840,\"recovery\":\"norecovery\",\"gameName\":\"Rainbow Queen\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":100,\"name\":\"all\"},{\"order\":13,\"name\":\"extraline\"},{\"order\":100,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"JOBJPoker\":[{\"gameIdentificationNumber\":20202,\"recovery\":\"norecovery\",\"gameName\":\"Jacks or Better\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":122,\"name\":\"all\"},{\"order\":3,\"name\":\"cards\"},{\"order\":122,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"SHDJSlot\":[{\"gameIdentificationNumber\":560,\"recovery\":\"norecovery\",\"gameName\":\"Shining Dice\",\"featured\":true,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":123,\"name\":\"all\"},{\"order\":1,\"name\":\"diceSlots\"},{\"order\":123,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"CHJSlot\":[{\"gameIdentificationNumber\":506,\"recovery\":\"norecovery\",\"gameName\":\"Caramel Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":34,\"name\":\"all\"},{\"order\":23,\"name\":\"fruit\"},{\"order\":34,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"LAWJSlot\":[{\"gameIdentificationNumber\":868,\"recovery\":\"norecovery\",\"gameName\":\"Lucky \\u0026 Wild\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":58,\"name\":\"all\"},{\"order\":33,\"name\":\"fruit\"},{\"order\":58,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"DSJSlot\":[{\"gameIdentificationNumber\":877,\"recovery\":\"norecovery\",\"gameName\":\"Dragon Spirit\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":145,\"name\":\"all\"},{\"order\":23,\"name\":\"diceSlots\"},{\"order\":145,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"VDJSlot\":[{\"gameIdentificationNumber\":832,\"recovery\":\"norecovery\",\"gameName\":\"Venezia D\\u0027oro\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":92,\"name\":\"all\"},{\"order\":12,\"name\":\"extraline\"},{\"order\":92,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"LBJSlot\":[{\"gameIdentificationNumber\":881,\"recovery\":\"norecovery\",\"gameName\":\"Lucky Buzz\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":84,\"name\":\"all\"},{\"order\":14,\"name\":\"multiline\"},{\"order\":84,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"HBHJSlot\":[{\"gameIdentificationNumber\":548,\"recovery\":\"norecovery\",\"gameName\":\"100 Burning Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":20,\"name\":\"all\"},{\"order\":15,\"name\":\"fruit\"},{\"order\":20,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"MLAWJSlot\":[{\"gameIdentificationNumber\":869,\"recovery\":\"norecovery\",\"gameName\":\"More Lucky \\u0026 Wild\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":46,\"name\":\"all\"},{\"order\":31,\"name\":\"fruit\"},{\"order\":46,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FTJSlot\":[{\"gameIdentificationNumber\":876,\"recovery\":\"norecovery\",\"gameName\":\"Forest Tale\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":113,\"name\":\"all\"},{\"order\":29,\"name\":\"multiline\"},{\"order\":113,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"AOTJSlot\":[{\"gameIdentificationNumber\":812,\"recovery\":\"norecovery\",\"gameName\":\"Age of Troy\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":48,\"name\":\"all\"},{\"order\":3,\"name\":\"multiline\"},{\"order\":48,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"SOAJSlot\":[{\"gameIdentificationNumber\":828,\"recovery\":\"norecovery\",\"gameName\":\"Secrets of Alchemy\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":22,\"name\":\"all\"},{\"order\":1,\"name\":\"multiline\"},{\"order\":22,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"SLJSlot\":[{\"gameIdentificationNumber\":892,\"recovery\":\"norecovery\",\"gameName\":\"Savanna\\u0027s Life\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":119,\"name\":\"all\"},{\"order\":32,\"name\":\"multiline\"},{\"order\":119,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"BHJSlot\":[{\"gameIdentificationNumber\":801,\"recovery\":\"norecovery\",\"gameName\":\"Burning Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":7,\"name\":\"all\"},{\"order\":3,\"name\":\"fruit\"},{\"order\":7,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TSDJSlot\":[{\"gameIdentificationNumber\":20218,\"recovery\":\"norecovery\",\"gameName\":\"20 Super Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":128,\"name\":\"all\"},{\"order\":6,\"name\":\"diceSlots\"},{\"order\":128,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"JPJPoker\":[{\"gameIdentificationNumber\":20208,\"recovery\":\"norecovery\",\"gameName\":\"Joker Poker\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":120,\"name\":\"all\"},{\"order\":1,\"name\":\"cards\"},{\"order\":120,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"AGJSlot\":[{\"gameIdentificationNumber\":511,\"recovery\":\"norecovery\",\"gameName\":\"Aztec Glory\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":76,\"name\":\"all\"},{\"order\":16,\"name\":\"classic\"},{\"order\":76,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"GEOLJSlot\":[{\"gameIdentificationNumber\":872,\"recovery\":\"norecovery\",\"gameName\":\"Genius of Leonardo\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":103,\"name\":\"all\"},{\"order\":14,\"name\":\"extraline\"},{\"order\":103,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"BDJSlot\":[{\"gameIdentificationNumber\":20215,\"recovery\":\"norecovery\",\"gameName\":\"Burning Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":127,\"name\":\"all\"},{\"order\":5,\"name\":\"diceSlots\"},{\"order\":127,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"MPJSlot\":[{\"gameIdentificationNumber\":502,\"recovery\":\"norecovery\",\"gameName\":\"Magellan Plus\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":49,\"name\":\"all\"},{\"order\":6,\"name\":\"extraline\"},{\"order\":49,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"AAJSlot\":[{\"gameIdentificationNumber\":808,\"recovery\":\"norecovery\",\"gameName\":\"Amazing Amazonia\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":85,\"name\":\"all\"},{\"order\":21,\"name\":\"classic\"},{\"order\":85,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"CRBJSlot\":[{\"gameIdentificationNumber\":518,\"recovery\":\"norecovery\",\"gameName\":\"Crazy Bugs II\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":115,\"name\":\"all\"},{\"order\":30,\"name\":\"multiline\"},{\"order\":115,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"PSJSlot\":[{\"gameIdentificationNumber\":852,\"recovery\":\"norecovery\",\"gameName\":\"Penguin Style\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":62,\"name\":\"all\"},{\"order\":6,\"name\":\"multiline\"},{\"order\":62,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"WTJSlot\":[{\"gameIdentificationNumber\":505,\"recovery\":\"norecovery\",\"gameName\":\"Wonder Tree\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":89,\"name\":\"all\"},{\"order\":25,\"name\":\"classic\"},{\"order\":89,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"MDJSlot\":[{\"gameIdentificationNumber\":894,\"recovery\":\"norecovery\",\"gameName\":\"Magic Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":130,\"name\":\"all\"},{\"order\":8,\"name\":\"diceSlots\"},{\"order\":130,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"GTSJSlot\":[{\"gameIdentificationNumber\":555,\"recovery\":\"norecovery\",\"gameName\":\"Great 27\",\"featured\":true,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":5,\"name\":\"all\"},{\"order\":1,\"name\":\"fruit\"},{\"order\":5,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"SCJSlot\":[{\"gameIdentificationNumber\":831,\"recovery\":\"norecovery\",\"gameName\":\"Shining Crown\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":9,\"name\":\"all\"},{\"order\":5,\"name\":\"fruit\"},{\"order\":9,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TDHJSlot\":[{\"gameIdentificationNumber\":544,\"recovery\":\"norecovery\",\"gameName\":\"20 Dazzling Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":37,\"name\":\"all\"},{\"order\":25,\"name\":\"fruit\"},{\"order\":37,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FHNCJSlot\":[{\"gameIdentificationNumber\":545,\"recovery\":\"norecovery\",\"gameName\":\"40 Hot \\u0026 Cash\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":59,\"name\":\"all\"},{\"order\":59,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"DARJSlot\":[{\"gameIdentificationNumber\":824,\"recovery\":\"norecovery\",\"gameName\":\"Dice \\u0026 Roll\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":39,\"name\":\"all\"},{\"order\":26,\"name\":\"fruit\"},{\"order\":39,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"MLADJSlot\":[{\"gameIdentificationNumber\":516,\"recovery\":\"norecovery\",\"gameName\":\"More Like a Diamond\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":110,\"name\":\"all\"},{\"order\":15,\"name\":\"extraline\"},{\"order\":110,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"DORJSlot\":[{\"gameIdentificationNumber\":856,\"recovery\":\"norecovery\",\"gameName\":\"Dice of Ra\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":140,\"name\":\"all\"},{\"order\":18,\"name\":\"diceSlots\"},{\"order\":140,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"CBJSlot\":[{\"gameIdentificationNumber\":829,\"recovery\":\"norecovery\",\"gameName\":\"Circus Brilliant\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":66,\"name\":\"all\"},{\"order\":7,\"name\":\"multiline\"},{\"order\":66,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FHDJSlot\":[{\"gameIdentificationNumber\":886,\"recovery\":\"norecovery\",\"gameName\":\"5 Hot Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":129,\"name\":\"all\"},{\"order\":7,\"name\":\"diceSlots\"},{\"order\":129,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"OGJSlot\":[{\"gameIdentificationNumber\":819,\"recovery\":\"norecovery\",\"gameName\":\"Olympus Glory\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":52,\"name\":\"all\"},{\"order\":7,\"name\":\"classic\"},{\"order\":52,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"SPJSlot\":[{\"gameIdentificationNumber\":895,\"recovery\":\"norecovery\",\"gameName\":\"Spanish Passion\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":88,\"name\":\"all\"},{\"order\":24,\"name\":\"classic\"},{\"order\":88,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"CRJSlot\":[{\"gameIdentificationNumber\":871,\"recovery\":\"norecovery\",\"gameName\":\"Cats Royal\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":69,\"name\":\"all\"},{\"order\":9,\"name\":\"multiline\"},{\"order\":69,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FBHJSlot\":[{\"gameIdentificationNumber\":529,\"recovery\":\"norecovery\",\"gameName\":\"40 Burning Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":16,\"name\":\"all\"},{\"order\":12,\"name\":\"fruit\"},{\"order\":16,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"GETJSlot\":[{\"gameIdentificationNumber\":885,\"recovery\":\"norecovery\",\"gameName\":\"The Great Egypt\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":81,\"name\":\"all\"},{\"order\":18,\"name\":\"classic\"},{\"order\":81,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TSWJSlot\":[{\"gameIdentificationNumber\":556,\"recovery\":\"norecovery\",\"gameName\":\"27 Wins\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":23,\"name\":\"all\"},{\"order\":16,\"name\":\"fruit\"},{\"order\":23,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"BOMJSlot\":[{\"gameIdentificationNumber\":826,\"recovery\":\"norecovery\",\"gameName\":\"Book of Magic\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":51,\"name\":\"all\"},{\"order\":6,\"name\":\"classic\"},{\"order\":51,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"DHIJSlot\":[{\"gameIdentificationNumber\":519,\"recovery\":\"norecovery\",\"gameName\":\"Dice High\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":112,\"name\":\"all\"},{\"order\":37,\"name\":\"fruit\"},{\"order\":112,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"IWJSlot\":[{\"gameIdentificationNumber\":841,\"recovery\":\"norecovery\",\"gameName\":\"Imperial Wars\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":70,\"name\":\"all\"},{\"order\":10,\"name\":\"multiline\"},{\"order\":70,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"EHJSlot\":[{\"gameIdentificationNumber\":880,\"recovery\":\"norecovery\",\"gameName\":\"Extremely Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":45,\"name\":\"all\"},{\"order\":30,\"name\":\"fruit\"},{\"order\":45,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FSHJSlot\":[{\"gameIdentificationNumber\":804,\"recovery\":\"norecovery\",\"gameName\":\"40 Super Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":8,\"name\":\"all\"},{\"order\":4,\"name\":\"fruit\"},{\"order\":8,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"BDIJSlot\":[{\"gameIdentificationNumber\":524,\"recovery\":\"norecovery\",\"gameName\":\"Bonus Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":147,\"name\":\"all\"},{\"order\":25,\"name\":\"diceSlots\"},{\"order\":147,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"EOWJSlot\":[{\"gameIdentificationNumber\":549,\"recovery\":\"norecovery\",\"gameName\":\"81 Wins\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":44,\"name\":\"all\"},{\"order\":29,\"name\":\"fruit\"},{\"order\":44,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"ESJSlot\":[{\"gameIdentificationNumber\":825,\"recovery\":\"norecovery\",\"gameName\":\"Egypt Sky\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":42,\"name\":\"all\"},{\"order\":4,\"name\":\"extraline\"},{\"order\":42,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"AMJSlot\":[{\"gameIdentificationNumber\":851,\"recovery\":\"norecovery\",\"gameName\":\"Action Money\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":101,\"name\":\"all\"},{\"order\":22,\"name\":\"multiline\"},{\"order\":101,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FJFJSlot\":[{\"gameIdentificationNumber\":557,\"recovery\":\"norecovery\",\"gameName\":\"5 Juggle Fruits\",\"featured\":true,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":4,\"name\":\"all\"},{\"order\":4,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"XJJSlot\":[{\"gameIdentificationNumber\":857,\"recovery\":\"norecovery\",\"gameName\":\"Extra Joker\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":132,\"name\":\"all\"},{\"order\":10,\"name\":\"diceSlots\"},{\"order\":132,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"LRJSlot\":[{\"gameIdentificationNumber\":510,\"recovery\":\"norecovery\",\"gameName\":\"Legendary Rome\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":104,\"name\":\"all\"},{\"order\":24,\"name\":\"multiline\"},{\"order\":104,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"ASJSlot\":[{\"gameIdentificationNumber\":522,\"recovery\":\"norecovery\",\"gameName\":\"Amazons\\u0027 Story\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":134,\"name\":\"all\"},{\"order\":12,\"name\":\"diceSlots\"},{\"order\":134,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"DRJSlot\":[{\"gameIdentificationNumber\":813,\"recovery\":\"norecovery\",\"gameName\":\"Dragon Reels\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":68,\"name\":\"all\"},{\"order\":8,\"name\":\"multiline\"},{\"order\":68,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"GDJSlot\":[{\"gameIdentificationNumber\":862,\"recovery\":\"norecovery\",\"gameName\":\"Gold Dust\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":111,\"name\":\"all\"},{\"order\":28,\"name\":\"multiline\"},{\"order\":111,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FGSJSlot\":[{\"gameIdentificationNumber\":553,\"recovery\":\"norecovery\",\"gameName\":\"5 Great Star\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":33,\"name\":\"all\"},{\"order\":22,\"name\":\"fruit\"},{\"order\":33,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FKJSlot\":[{\"gameIdentificationNumber\":811,\"recovery\":\"norecovery\",\"gameName\":\"Fruits Kingdom\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":74,\"name\":\"all\"},{\"order\":14,\"name\":\"classic\"},{\"order\":74,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"RGJSlot\":[{\"gameIdentificationNumber\":883,\"recovery\":\"norecovery\",\"gameName\":\"Royal Gardens\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":143,\"name\":\"all\"},{\"order\":21,\"name\":\"diceSlots\"},{\"order\":143,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"BHTJSlot\":[{\"gameIdentificationNumber\":814,\"recovery\":\"norecovery\",\"gameName\":\"Blue Heart\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":31,\"name\":\"all\"},{\"order\":2,\"name\":\"extraline\"},{\"order\":31,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"THSDJSlot\":[{\"gameIdentificationNumber\":535,\"recovery\":\"norecovery\",\"gameName\":\"30 Spicy Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":131,\"name\":\"all\"},{\"order\":9,\"name\":\"diceSlots\"},{\"order\":131,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"MSJSlot\":[{\"gameIdentificationNumber\":898,\"recovery\":\"norecovery\",\"gameName\":\"Mayan Spirit\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":64,\"name\":\"all\"},{\"order\":9,\"name\":\"extraline\"},{\"order\":64,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"MDARJSlot\":[{\"gameIdentificationNumber\":875,\"recovery\":\"norecovery\",\"gameName\":\"More Dice \\u0026 Roll\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":41,\"name\":\"all\"},{\"order\":28,\"name\":\"fruit\"},{\"order\":41,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"UJKeno\":[{\"gameIdentificationNumber\":701,\"recovery\":\"norecovery\",\"gameName\":\"Keno Universe\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":3,\"name\":\"all\"},{\"order\":1,\"name\":\"keno\"},{\"order\":3,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"RTSJSlot\":[{\"gameIdentificationNumber\":889,\"recovery\":\"norecovery\",\"gameName\":\"Retro Style\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":108,\"name\":\"all\"},{\"order\":27,\"name\":\"classic\"},{\"order\":108,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TJRJSlot\":[{\"gameIdentificationNumber\":554,\"recovery\":\"norecovery\",\"gameName\":\"20 Joker Reels\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":40,\"name\":\"all\"},{\"order\":27,\"name\":\"fruit\"},{\"order\":40,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"RBDJSlot\":[{\"gameIdentificationNumber\":870,\"recovery\":\"norecovery\",\"gameName\":\"Rainbow Dice\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":146,\"name\":\"all\"},{\"order\":24,\"name\":\"diceSlots\"},{\"order\":146,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"MFJSlot\":[{\"gameIdentificationNumber\":830,\"recovery\":\"norecovery\",\"gameName\":\"Majestic Forest\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":60,\"name\":\"all\"},{\"order\":10,\"name\":\"classic\"},{\"order\":60,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"LHJSlot\":[{\"gameIdentificationNumber\":849,\"recovery\":\"norecovery\",\"gameName\":\"Lucky Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":36,\"name\":\"all\"},{\"order\":24,\"name\":\"fruit\"},{\"order\":36,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"TBHJSlot\":[{\"gameIdentificationNumber\":530,\"recovery\":\"norecovery\",\"gameName\":\"20 Burning Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":13,\"name\":\"all\"},{\"order\":9,\"name\":\"fruit\"},{\"order\":13,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"HNCJSlot\":[{\"gameIdentificationNumber\":866,\"recovery\":\"norecovery\",\"gameName\":\"Hot \\u0026 Cash\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":63,\"name\":\"all\"},{\"order\":34,\"name\":\"fruit\"},{\"order\":63,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"HWJSlot\":[{\"gameIdentificationNumber\":833,\"recovery\":\"norecovery\",\"gameName\":\"Halloween\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":96,\"name\":\"all\"},{\"order\":19,\"name\":\"multiline\"},{\"order\":96,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"FLKJSlot\":[{\"gameIdentificationNumber\":546,\"recovery\":\"norecovery\",\"gameName\":\"40 Lucky King\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":32,\"name\":\"all\"},{\"order\":21,\"name\":\"fruit\"},{\"order\":32,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"JAJSlot\":[{\"gameIdentificationNumber\":503,\"recovery\":\"norecovery\",\"gameName\":\"Jungle Adventure\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":118,\"name\":\"all\"},{\"order\":29,\"name\":\"classic\"},{\"order\":118,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}],\"DHJSlot\":[{\"gameIdentificationNumber\":888,\"recovery\":\"norecovery\",\"gameName\":\"Dragon Hot\",\"featured\":false,\"mlmJackpot\":true,\"totalBet\":0,\"groups\":[{\"order\":93,\"name\":\"all\"},{\"order\":35,\"name\":\"fruit\"},{\"order\":93,\"name\":\"myGames\"}],\"jackpotGameType\":\"MLMJackpot\"}]},\"sessionKey\":\"41be9e65e0ff03a65e8c93576bf61130\",\"msg\":\"success\",\"messageId\":\"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["messageId"] . "\",\"qName\":\"app.services.messages.response.LoginResponse\",\"command\":\"login\",\"eventTimestamp\":" . time() . "}";
                break;
            case "settings":
                $_obf_0D2D04331D113C26041C220D1B1D010E0331292A165B01 = $slotSettings->Bet;
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"complex\":{\"paytableCoef\":{\"0\":{\"coef\":[10,30,150],\"multiplier\":1},\"1\":{\"coef\":[10,30,150],\"multiplier\":1},\"2\":{\"coef\":[10,30,150],\"multiplier\":1},\"3\":{\"coef\":[10,30,150],\"multiplier\":1},\"4\":{\"coef\":[20,40,200],\"multiplier\":1},\"5\":{\"coef\":[40,120,700],\"multiplier\":1},\"6\":{\"coef\":[40,120,700],\"multiplier\":1},\"7\":{\"coef\":[10,50,250,5000],\"multiplier\":1},\"8\":{\"coef\":[],\"multiplier\":1},\"9\":{\"coef\":[20],\"multiplier\":1},\"10\":{\"coef\":[5,20,100],\"multiplier\":1}},\"bets\":[" . implode(",", $_obf_0D2D04331D113C26041C220D1B1D010E0331292A165B01) . "],\"jackpotMinBet\":1,\"jackpot\":true,\"mainFakeReels\":[[6,2,2,2,0,0,0,5,4,1,5,10,1,1,3,4,7,4,9,4],[7,2,2,2,5,3,0,0,10,6,3,3,1,1,4,1,4,8,4,2],[6,1,1,8,7,1,5,3,3,9,1,4,0,4,2,2,2,10,0,0],[1,1,1,7,1,3,3,8,6,4,3,4,2,2,10,2,0,0,5,1],[7,3,3,2,2,1,6,10,1,1,3,3,3,2,7,0,0,4,9,4]],\"jackpotMaxBet\":100000,\"denominations\":[[100,70,3000000]]},\"gameIdentificationNumber\":532,\"gameNumber\":\"\",\"sessionKey\":\"41be9e65e0ff03a65e8c93576bf61130\",\"msg\":\"success\",\"messageId\":\"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["messageId"] . "\",\"qName\":\"app.services.messages.response.GameResponse\",\"command\":\"settings\",\"eventTimestamp\":" . time() . "}";
                break;
            case "subscribe":
                $_obf_0D38313F0A2409140F192A242E034033033B1C015B3022 = [78, 30, 46, 62, 46, 30];
                shuffle($_obf_0D38313F0A2409140F192A242E034033033B1C015B3022);
                $request->session()->put("BurningHeart5EGTCards", $_obf_0D38313F0A2409140F192A242E034033033B1C015B3022);
                $lastEvent = $slotSettings->GetHistory();
                $request->session()->put("BurningHeart5EGTBonusWin", 0);
                $request->session()->put("BurningHeart5EGTFreeGames", 0);
                $request->session()->put("BurningHeart5EGTCurrentFreeGame", 0);
                $request->session()->put("BurningHeart5EGTTotalWin", 0);
                $request->session()->put("BurningHeart5EGTFreeBalance", 0);
                if( $lastEvent != "NULL" ) 
                {
                    if( isset($lastEvent->serverResponse->bonusWin) ) 
                    {
                        $request->session()->put($slotSettings->slotId . "BonusWin", $lastEvent->serverResponse->bonusWin);
                    }
                    else
                    {
                        $request->session()->put($slotSettings->slotId . "BonusWin", $lastEvent->serverResponse->totalWin);
                    }
                    $request->session()->put($slotSettings->slotId . "FreeGames", $lastEvent->serverResponse->totalFreeGames);
                    $request->session()->put($slotSettings->slotId . "CurrentFreeGame", $lastEvent->serverResponse->currentFreeGames);
                    $request->session()->put($slotSettings->slotId . "TotalWin", $lastEvent->serverResponse->totalWin);
                    $request->session()->put($slotSettings->slotId . "FreeBalance", $lastEvent->serverResponse->Balance);
                    $reels = $lastEvent->serverResponse->reelsSymbols;
                    $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 = "" . rand(1, 8) . "," . $reels->reel1[0] . "," . $reels->reel1[1] . "," . $reels->reel1[2] . "," . rand(1, 8);
                    $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 .= ("," . rand(1, 8) . "," . $reels->reel2[0] . "," . $reels->reel2[1] . "," . $reels->reel2[2] . "," . rand(1, 8));
                    $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 .= ("," . rand(1, 8) . "," . $reels->reel3[0] . "," . $reels->reel3[1] . "," . $reels->reel3[2] . "," . rand(1, 8));
                    $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 .= ("," . rand(1, 8) . "," . $reels->reel4[0] . "," . $reels->reel4[1] . "," . $reels->reel4[2] . "," . rand(1, 8));
                    $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 .= ("," . rand(1, 8) . "," . $reels->reel5[0] . "," . $reels->reel5[1] . "," . $reels->reel5[2] . "," . rand(1, 8));
                    $lines = $lastEvent->serverResponse->slotLines;
                    $bet = $lastEvent->serverResponse->slotBet * $lines * 100;
                    $_obf_0D07373B213307333F4008192E34311A282121305C2C32 = 1;
                    if( session("BurningHeart5EGTCurrentFreeGame") < session("BurningHeart5EGTFreeGames") && session("BurningHeart5EGTFreeGames") > 0 ) 
                    {
                        $_obf_0D07373B213307333F4008192E34311A282121305C2C32 = 2;
                    }
                }
                else
                {
                    $_obf_0D07373B213307333F4008192E34311A282121305C2C32 = 1;
                    $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 = "" . rand(1, 8) . "," . rand(0, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "," . rand(1, 8) . "";
                    $lines = 10;
                }
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"complex\":{\"currentState\":{\"gamblesUsed\":0,\"freespinsUsed\":0,\"previousGambles\":[],\"bet\":100,\"numberOfLines\":20,\"denomination\":100,\"state\":\"idle\",\"winAmount\":0,\"reels\":[" . $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 . "],\"lines\":[],\"scatters\":[],\"expand\":[],\"specialExpand\":[],\"gambles\":0,\"freespins\":0,\"freespinScatters\":[],\"jackpot\":false},\"jackpotState\":{\"levelI\":" . ($slotSettings->slotJackpot[0] * 100) . ",\"levelII\":" . ($slotSettings->slotJackpot[1] * 100) . ",\"levelIII\":" . ($slotSettings->slotJackpot[2] * 100) . ",\"levelIV\":" . ($slotSettings->slotJackpot[3] * 100) . ",\"winsLevelI\":0,\"largestWinLevelI\":0,\"largestWinDateLevelI\":\"\",\"largestWinUserLevelI\":\"\",\"lastWinLevelI\":0,\"lastWinDateLevelI\":\"\",\"lastWinUserLevelI\":\"player\",\"winsLevelII\":0,\"largestWinLevelII\":0,\"largestWinDateLevelII\":\"\",\"largestWinUserLevelII\":\"\",\"lastWinLevelII\":0,\"lastWinDateLevelII\":\"\",\"lastWinUserLevelII\":\"player\",\"winsLevelIII\":0,\"largestWinLevelIII\":0,\"largestWinDateLevelIII\":\"\",\"largestWinUserLevelIII\":\"\",\"lastWinLevelIII\":0,\"lastWinDateLevelIII\":\"\",\"lastWinUserLevelIII\":\"\",\"winsLevelIV\":18133,\"largestWinLevelIV\":0,\"largestWinDateLevelIV\":\"\",\"largestWinUserLevelIV\":\"\",\"lastWinLevelIV\":0,\"lastWinDateLevelIV\":\"\",\"lastWinUserLevelIV\":\"\"}},\"gameIdentificationNumber\":532,\"gameNumber\":\"\",\"sessionKey\":\"41be9e65e0ff03a65e8c93576bf61130\",\"msg\":\"success\",\"messageId\":\"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["messageId"] . "\",\"qName\":\"app.services.messages.response.GameEventResponse\",\"command\":\"subscribe\",\"eventTimestamp\":" . time() . "}";
                break;
            case "ping":
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"sessionKey\":\"41be9e65e0ff03a65e8c93576bf61130\",\"msg\":\"success\",\"messageId\":\"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["messageId"] . "\",\"qName\":\"app.services.messages.response.BaseResponse\",\"command\":\"ping\",\"eventTimestamp\":" . time() . "}";
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"complex\":{\"levelI\":" . ($slotSettings->slotJackpot[0] * 100) . ",\"levelII\":" . ($slotSettings->slotJackpot[1] * 100) . ",\"levelIII\":" . ($slotSettings->slotJackpot[2] * 100) . ",\"levelIV\":" . ($slotSettings->slotJackpot[3] * 100) . ",\"winsLevelI\":2,\"largestWinLevelI\":0,\"largestWinDateLevelI\":\"\",\"largestWinUserLevelI\":\"\",\"lastWinLevelI\":0,\"lastWinDateLevelI\":\"\",\"lastWinUserLevelI\":\"player\",\"winsLevelII\":0,\"largestWinLevelII\":0,\"largestWinDateLevelII\":\"\",\"largestWinUserLevelII\":\"\",\"lastWinLevelII\":0,\"lastWinDateLevelII\":\"\",\"lastWinUserLevelII\":\"player\",\"winsLevelIII\":0,\"largestWinLevelIII\":0,\"largestWinDateLevelIII\":\"\",\"largestWinUserLevelIII\":\"\",\"lastWinLevelIII\":0,\"lastWinDateLevelIII\":\"\",\"lastWinUserLevelIII\":\"\",\"winsLevelIV\":0,\"largestWinLevelIV\":0,\"largestWinDateLevelIV\":\"\",\"largestWinUserLevelIV\":\"\",\"lastWinLevelIV\":0,\"lastWinDateLevelIV\":\"\",\"lastWinUserLevelIV\":\"\"},\"gameIdentificationNumber\":1,\"gameNumber\":\"\",\"msg\":\"success\",\"messageId\":\"f73a429df116252e537e403d12bcdb92\",\"qName\":\"app.services.messages.response.GameEventResponse\",\"command\":\"event\",\"eventTimestamp\":" . time() . "}";
                break;
            case "bet":
                $linesId = [];
                $linesId[0] = [2, 2, 2, 2, 2];
                $linesId[1] = [1, 1, 1, 1, 1];
                $linesId[2] = [3, 3, 3, 3, 3];
                $linesId[3] = [1, 2, 3, 2, 1];
                $linesId[4] = [3, 2, 1, 2, 3];
                $linesId[5] = [1, 1, 2, 3, 3];
                $linesId[6] = [3, 3, 2, 1, 1];
                $linesId[7] = [2, 3, 3, 3, 2];
                $linesId[8] = [2, 1, 1, 1, 2];
                $linesId[9] = [1, 2, 2, 2, 1];
                $linesId[10] = [3, 2, 2, 2, 3];
                $linesId[11] = [2, 3, 2, 1, 2];
                $linesId[12] = [2, 1, 2, 3, 2];
                $linesId[13] = [1, 2, 1, 2, 1];
                $linesId[14] = [3, 2, 3, 2, 3];
                $linesId[15] = [2, 2, 3, 2, 2];
                $linesId[16] = [2, 2, 1, 2, 2];
                $linesId[17] = [1, 3, 1, 3, 1];
                $linesId[18] = [3, 1, 3, 1, 3];
                $linesId[19] = [2, 1, 3, 1, 2];
                $lines = $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["bet"]["lines"];
                $betline = $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["bet"]["bet"] / 100;
                $allbet = $betline * $lines;
                $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["slotEvent"] = "bet";
                if( $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["slotEvent"] != "freespin" ) 
                {
                    $slotSettings->SetBalance(-1 * $allbet);
                    $_obf_0D0E3C14150C2815351E0C385C3B1C2A2A2A29282D0611 = $allbet / 100 * $slotSettings->GetPercent();
                    $slotSettings->SetBank($_obf_0D0E3C14150C2815351E0C385C3B1C2A2A2A29282D0611);
                    $slotSettings->UpdateJackpots($allbet);
                    $request->session()->put("BurningHeart5EGTBonusWin", 0);
                    $request->session()->put("BurningHeart5EGTFreeGames", 0);
                    $request->session()->put("BurningHeart5EGTCurrentFreeGame", 0);
                    $request->session()->put("BurningHeart5EGTTotalWin", 0);
                    $request->session()->put("BurningHeart5EGTFreeBalance", 0);
                    $bonusMpl = 1;
                }
                else
                {
                    $bonusMpl = $slotSettings->slotFreeMpl;
                }
                $_obf_0D2C2C263D403F5C16290A221B1531061A2A400B2D3111 = $slotSettings->GetSpinSettings($allbet);
                $winType = $_obf_0D2C2C263D403F5C16290A221B1531061A2A400B2D3111[0];
                $_obf_0D360A1A342F102A2C2E0F0F22022D150D020F06321F22 = $_obf_0D2C2C263D403F5C16290A221B1531061A2A400B2D3111[1];
                $_obf_0D1A01320D0F3F2238312A1614230C3C3D24142A161A01 = sprintf("%01.2f", $slotSettings->GetBalance()) * 100;
                $_obf_0D091A181D2C341A0436240708080D3C2E071E17042E22 = rand(1, 100);
                for( $i = 0; $i <= 2000; $i++ ) 
                {
                    $totalWin = 0;
                    $lineWins = [];
                    $cWins = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    $wild = ["8"];
                    $scatter = "9";
                    $reels = $slotSettings->GetReelStrips($winType, $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["slotEvent"]);
                    for( $k = 0; $k < $lines; $k++ ) 
                    {
                        $_obf_0D191E0104341E041F35232A05013119105B0813145C01 = "";
                        for( $j = 0; $j < count($slotSettings->SymbolGame); $j++ ) 
                        {
                            $_obf_0D30261904292D080B151C2737160F3233192735083E22 = $slotSettings->SymbolGame[$j];
                            if( $_obf_0D30261904292D080B151C2737160F3233192735083E22 == $scatter || !isset($slotSettings->Paytable["SYM_" . $_obf_0D30261904292D080B151C2737160F3233192735083E22]) ) 
                            {
                            }
                            else
                            {
                                $s = [];
                                $s[0] = $reels["reel1"][$linesId[$k][0] - 1];
                                $s[1] = $reels["reel2"][$linesId[$k][1] - 1];
                                $s[2] = $reels["reel3"][$linesId[$k][2] - 1];
                                $s[3] = $reels["reel4"][$linesId[$k][3] - 1];
                                $s[4] = $reels["reel5"][$linesId[$k][4] - 1];
                                if( ($s[0] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[0], $wild)) && ($s[1] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[1], $wild)) ) 
                                {
                                    $mpl = 1;
                                    if( in_array($s[0], $wild) && in_array($s[1], $wild) ) 
                                    {
                                        $mpl = 1;
                                    }
                                    else if( in_array($s[0], $wild) || in_array($s[1], $wild) ) 
                                    {
                                        $mpl = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122 = $slotSettings->Paytable["SYM_" . $_obf_0D30261904292D080B151C2737160F3233192735083E22][2] * $betline * $mpl * $bonusMpl;
                                    if( $cWins[$k] < $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122 ) 
                                    {
                                        $cWins[$k] = $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122;
                                        $_obf_0D191E0104341E041F35232A05013119105B0813145C01 = "{\"line\":" . $k . ",\"winAmount\":" . ($cWins[$k] * 100) . ",\"cells\":[0," . ($linesId[$k][0] - 1) . ",1," . ($linesId[$k][1] - 1) . "],\"freespins\":0,\"card\":" . $_obf_0D30261904292D080B151C2737160F3233192735083E22 . "}";
                                    }
                                }
                                if( ($s[0] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[0], $wild)) && ($s[1] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[1], $wild)) && ($s[2] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[2], $wild)) ) 
                                {
                                    $mpl = 1;
                                    if( in_array($s[0], $wild) && in_array($s[1], $wild) && in_array($s[2], $wild) ) 
                                    {
                                        $mpl = 1;
                                    }
                                    else if( in_array($s[0], $wild) || in_array($s[1], $wild) || in_array($s[2], $wild) ) 
                                    {
                                        $mpl = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122 = $slotSettings->Paytable["SYM_" . $_obf_0D30261904292D080B151C2737160F3233192735083E22][3] * $betline * $mpl * $bonusMpl;
                                    if( $cWins[$k] < $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122 ) 
                                    {
                                        $cWins[$k] = $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122;
                                        $_obf_0D191E0104341E041F35232A05013119105B0813145C01 = "{\"line\":" . $k . ",\"winAmount\":" . ($cWins[$k] * 100) . ",\"cells\":[0," . ($linesId[$k][0] - 1) . ",1," . ($linesId[$k][1] - 1) . ",2," . ($linesId[$k][2] - 1) . "],\"freespins\":0,\"card\":" . $_obf_0D30261904292D080B151C2737160F3233192735083E22 . "}";
                                    }
                                }
                                if( ($s[0] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[0], $wild)) && ($s[1] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[1], $wild)) && ($s[2] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[2], $wild)) && ($s[3] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[3], $wild)) ) 
                                {
                                    $mpl = 1;
                                    if( in_array($s[0], $wild) && in_array($s[1], $wild) && in_array($s[2], $wild) && in_array($s[3], $wild) ) 
                                    {
                                        $mpl = 1;
                                    }
                                    else if( in_array($s[0], $wild) || in_array($s[1], $wild) || in_array($s[2], $wild) || in_array($s[3], $wild) ) 
                                    {
                                        $mpl = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122 = $slotSettings->Paytable["SYM_" . $_obf_0D30261904292D080B151C2737160F3233192735083E22][4] * $betline * $mpl * $bonusMpl;
                                    if( $cWins[$k] < $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122 ) 
                                    {
                                        $cWins[$k] = $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122;
                                        $_obf_0D191E0104341E041F35232A05013119105B0813145C01 = "{\"line\":" . $k . ",\"winAmount\":" . ($cWins[$k] * 100) . ",\"cells\":[0," . ($linesId[$k][0] - 1) . ",1," . ($linesId[$k][1] - 1) . ",2," . ($linesId[$k][2] - 1) . ",3," . ($linesId[$k][3] - 1) . "],\"freespins\":0,\"card\":" . $_obf_0D30261904292D080B151C2737160F3233192735083E22 . "}";
                                    }
                                }
                                if( ($s[0] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[0], $wild)) && ($s[1] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[1], $wild)) && ($s[2] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[2], $wild)) && ($s[3] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[3], $wild)) && ($s[4] == $_obf_0D30261904292D080B151C2737160F3233192735083E22 || in_array($s[4], $wild)) ) 
                                {
                                    $mpl = 1;
                                    if( in_array($s[0], $wild) && in_array($s[1], $wild) && in_array($s[2], $wild) && in_array($s[3], $wild) && in_array($s[4], $wild) ) 
                                    {
                                        $mpl = 1;
                                    }
                                    else if( in_array($s[0], $wild) || in_array($s[1], $wild) || in_array($s[2], $wild) || in_array($s[3], $wild) || in_array($s[4], $wild) ) 
                                    {
                                        $mpl = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122 = $slotSettings->Paytable["SYM_" . $_obf_0D30261904292D080B151C2737160F3233192735083E22][5] * $betline * $mpl * $bonusMpl;
                                    if( $cWins[$k] < $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122 ) 
                                    {
                                        $cWins[$k] = $_obf_0D1D0B0B19370807320F3F33260A143313142D14063122;
                                        $_obf_0D191E0104341E041F35232A05013119105B0813145C01 = "{\"line\":" . $k . ",\"winAmount\":" . ($cWins[$k] * 100) . ",\"cells\":[0," . ($linesId[$k][0] - 1) . ",1," . ($linesId[$k][1] - 1) . ",2," . ($linesId[$k][2] - 1) . ",3," . ($linesId[$k][3] - 1) . ",4," . ($linesId[$k][4] - 1) . "],\"freespins\":0,\"card\":" . $_obf_0D30261904292D080B151C2737160F3233192735083E22 . "}";
                                    }
                                }
                            }
                        }
                        if( $cWins[$k] > 0 && $_obf_0D191E0104341E041F35232A05013119105B0813145C01 != "" ) 
                        {
                            array_push($lineWins, $_obf_0D191E0104341E041F35232A05013119105B0813145C01);
                            $totalWin += $cWins[$k];
                        }
                    }
                    $scattersWin = 0;
                    $scattersStr = "";
                    $scattersCount = 0;
                    $_obf_0D5B19291A2B051627193F0E171021140F05281A170601 = [];
                    for( $r = 1; $r <= 5; $r++ ) 
                    {
                        for( $p = 0; $p <= 2; $p++ ) 
                        {
                            if( $reels["reel" . $r][$p] == "9" ) 
                            {
                                $scattersCount++;
                                $_obf_0D5B19291A2B051627193F0E171021140F05281A170601[] = "[" . ($r - 1) . "," . $p . "]";
                            }
                        }
                    }
                    $scattersWin = $slotSettings->Paytable["SYM_9"][$scattersCount] * $allbet;
                    if( $scattersWin > 0 ) 
                    {
                        $_obf_0D212927152F010A05241A1125182730391A132E0B1332 = 0;
                        if( $scattersCount >= 3 ) 
                        {
                            $_obf_0D212927152F010A05241A1125182730391A132E0B1332 = $slotSettings->slotFreeCount;
                        }
                        $scattersStr = "{\"scatterName\":9,\"cells\":[" . implode(",", $_obf_0D5B19291A2B051627193F0E171021140F05281A170601) . "],\"winAmount\":" . ($scattersWin * 100) . ",\"freespins\":0}";
                    }
                    $totalWin += $scattersWin;
                    if( $i > 1000 ) 
                    {
                        $winType = "none";
                    }
                    if( $i > 1500 ) 
                    {
                        $response = "{\"responseEvent\":\"error\",\"responseType\":\"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["slotEvent"] . "\",\"serverResponse\":\"Bad Reel Strip\"}";
                        exit( $response );
                    }
                    if( $scattersCount >= 3 && $winType != "bonus" ) 
                    {
                    }
                    else if( $totalWin <= $_obf_0D360A1A342F102A2C2E0F0F22022D150D020F06321F22 && $winType == "bonus" ) 
                    {
                        $_obf_0D3639053B2E25370F2C2A37151E280D3E0D1340262801 = $slotSettings->GetBank();
                        if( $_obf_0D3639053B2E25370F2C2A37151E280D3E0D1340262801 < $_obf_0D360A1A342F102A2C2E0F0F22022D150D020F06321F22 ) 
                        {
                            $_obf_0D360A1A342F102A2C2E0F0F22022D150D020F06321F22 = $_obf_0D3639053B2E25370F2C2A37151E280D3E0D1340262801;
                        }
                        else
                        {
                            break;
                        }
                    }
                    else if( $totalWin > 0 && $totalWin <= $_obf_0D360A1A342F102A2C2E0F0F22022D150D020F06321F22 && $winType == "win" ) 
                    {
                        $_obf_0D3639053B2E25370F2C2A37151E280D3E0D1340262801 = $slotSettings->GetBank();
                        if( $_obf_0D3639053B2E25370F2C2A37151E280D3E0D1340262801 < $_obf_0D360A1A342F102A2C2E0F0F22022D150D020F06321F22 ) 
                        {
                            $_obf_0D360A1A342F102A2C2E0F0F22022D150D020F06321F22 = $_obf_0D3639053B2E25370F2C2A37151E280D3E0D1340262801;
                        }
                        else
                        {
                            break;
                        }
                    }
                    else if( $totalWin == 0 && $winType == "none" ) 
                    {
                        break;
                    }
                }
                if( $totalWin > 0 ) 
                {
                    $slotSettings->SetBank(-1 * $totalWin);
                    $slotSettings->SetBalance($totalWin);
                }
                $_obf_0D250139370F050403312640023B151E0C1D100A083132 = $totalWin;
                $_obf_0D123619060F0917151F2F2C17211503330A0B0D1D3932 = implode(",", $lineWins);
                $_obf_0D0C012F183D392B143C1C322B1615301E1F1F0D163732 = "" . json_encode($reels) . "";
                $_obf_0D1A071D40021A0D5B5B3619273F01243E131E1C130D22 = "" . json_encode($slotSettings->Jackpots) . "";
                $response = "{\"responseEvent\":\"spin\",\"responseType\":\"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["slotEvent"] . "\",\"serverResponse\":{\"slotLines\":" . $lines . ",\"slotBet\":" . $betline . ",\"totalFreeGames\":" . session("BurningHeart5EGTFreeGames") . ",\"currentFreeGames\":" . session("BurningHeart5EGTCurrentFreeGame") . ",\"Balance\":" . $slotSettings->GetBalance() . ",\"afterBalance\":" . $slotSettings->GetBalance() . ",\"bonusWin\":" . session("BurningHeart5EGTBonusWin") . ",\"totalWin\":" . $totalWin . ",\"winLines\":[" . $_obf_0D123619060F0917151F2F2C17211503330A0B0D1D3932 . "],\"Jackpots\":" . $_obf_0D1A071D40021A0D5B5B3619273F01243E131E1C130D22 . ",\"reelsSymbols\":" . $_obf_0D0C012F183D392B143C1C322B1615301E1F1F0D163732 . "}}";
                $slotSettings->SaveLogReport($response, $betline, $lines, $_obf_0D250139370F050403312640023B151E0C1D100A083132, $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["slotEvent"]);
                $_obf_0D24132F3323251D2F172D1D0E2C0F31350E051B243911 = "";
                $request->session()->put("BurningHeart5EGTTotalWin", $totalWin);
                $request->session()->put("BurningHeart5EGTGambleStep", 5);
                $_obf_0D38313F0A2409140F192A242E034033033B1C015B3022 = session("BurningHeart5EGTCards");
                $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 = "" . rand(1, 8) . "," . $reels["reel1"][0] . "," . $reels["reel1"][1] . "," . $reels["reel1"][2] . "," . rand(1, 8);
                $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 .= ("," . rand(1, 8) . "," . $reels["reel2"][0] . "," . $reels["reel2"][1] . "," . $reels["reel2"][2] . "," . rand(1, 8));
                $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 .= ("," . rand(1, 8) . "," . $reels["reel3"][0] . "," . $reels["reel3"][1] . "," . $reels["reel3"][2] . "," . rand(1, 8));
                $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 .= ("," . rand(1, 8) . "," . $reels["reel4"][0] . "," . $reels["reel4"][1] . "," . $reels["reel4"][2] . "," . rand(1, 8));
                $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 .= ("," . rand(1, 8) . "," . $reels["reel5"][0] . "," . $reels["reel5"][1] . "," . $reels["reel5"][2] . "," . rand(1, 8));
                if( $_obf_0D091A181D2C341A0436240708080D3C2E071E17042E22 == 1 ) 
                {
                    $state = "jackpot";
                    $_obf_0D3D0C2D153932113D16250D0C171E0110070E355C2211 = "true";
                    $request->session()->put("BurningHeart5EGTJackSteps", [0, 0, 0, 0]);
                }
                else
                {
                    $_obf_0D3D0C2D153932113D16250D0C171E0110070E355C2211 = "false";
                    if( $totalWin > 0 ) 
                    {
                        $state = "gamble";
                    }
                    else
                    {
                        $state = "idle";
                    }
                }
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"complex\":{\"reels\":[" . $_obf_0D1D2D235C402F3C305B371C0E361D2B402E2B3E163801 . "],\"lines\":[" . $_obf_0D123619060F0917151F2F2C17211503330A0B0D1D3932 . "],\"scatters\":[" . $scattersStr . "],\"expand\":[],\"specialExpand\":[],\"gambles\":5,\"freespins\":0,\"jackpot\":" . $_obf_0D3D0C2D153932113D16250D0C171E0110070E355C2211 . ",\"gameCommand\":\"bet\"},\"state\":\"" . $state . "\",\"winAmount\":" . ($totalWin * 100) . ",\"gameIdentificationNumber\":532,\"gameNumber\":\"\",\"balance\":" . $_obf_0D1A01320D0F3F2238312A1614230C3C3D24142A161A01 . ",\"sessionKey\":\"41be9e65e0ff03a65e8c93576bf61130\",\"msg\":\"success\",\"messageId\":\"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["messageId"] . "\",\"qName\":\"app.services.messages.response.GameEventResponse\",\"command\":\"bet\",\"eventTimestamp\":" . time() . "}";
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"complex\":{\"levelI\":" . ($slotSettings->slotJackpot[0] * 100) . ",\"levelII\":" . ($slotSettings->slotJackpot[1] * 100) . ",\"levelIII\":" . ($slotSettings->slotJackpot[2] * 100) . ",\"levelIV\":" . ($slotSettings->slotJackpot[3] * 100) . ",\"winsLevelI\":2,\"largestWinLevelI\":0,\"largestWinDateLevelI\":\"\",\"largestWinUserLevelI\":\"\",\"lastWinLevelI\":0,\"lastWinDateLevelI\":\"\",\"lastWinUserLevelI\":\"player\",\"winsLevelII\":0,\"largestWinLevelII\":0,\"largestWinDateLevelII\":\"\",\"largestWinUserLevelII\":\"\",\"lastWinLevelII\":0,\"lastWinDateLevelII\":\"\",\"lastWinUserLevelII\":\"player\",\"winsLevelIII\":0,\"largestWinLevelIII\":0,\"largestWinDateLevelIII\":\"\",\"largestWinUserLevelIII\":\"\",\"lastWinLevelIII\":0,\"lastWinDateLevelIII\":\"\",\"lastWinUserLevelIII\":\"\",\"winsLevelIV\":0,\"largestWinLevelIV\":0,\"largestWinDateLevelIV\":\"\",\"largestWinUserLevelIV\":\"\",\"lastWinLevelIV\":0,\"lastWinDateLevelIV\":\"\",\"lastWinUserLevelIV\":\"\"},\"gameIdentificationNumber\":" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["gameIdentificationNumber"] . ",\"gameNumber\":\"\",\"msg\":\"success\",\"messageId\":\"f73a429df116252e537e403d12bcdb92\",\"qName\":\"app.services.messages.response.GameEventResponse\",\"command\":\"event\",\"eventTimestamp\":" . time() . "}";
                break;
            case "collect":
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"complex\":{\"gameCommand\":\"collect\"},\"state\":\"idle\",\"winAmount\":" . (session("BurningHeart5EGTTotalWin") * 100) . ",\"gameIdentificationNumber\":532,\"gameNumber\":\"\",\"balance\":" . $_obf_0D1A01320D0F3F2238312A1614230C3C3D24142A161A01 . ",\"sessionKey\":\"41be9e65e0ff03a65e8c93576bf61130\",\"msg\":\"success\",\"messageId\":\"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["messageId"] . "\",\"qName\":\"app.services.messages.response.GameEventResponse\",\"command\":\"bet\",\"eventTimestamp\":" . time() . "}";
                $request->session()->put("BurningHeart5EGTTotalWin", 0);
                break;
            case "jackpot":
                $_obf_0D1E0C0C2F3D1A143F0F040A363E12182621022B322111 = session("BurningHeart5EGTJackSteps");
                if( $_obf_0D1E0C0C2F3D1A143F0F040A363E12182621022B322111[0] >= 3 || $_obf_0D1E0C0C2F3D1A143F0F040A363E12182621022B322111[1] >= 3 || $_obf_0D1E0C0C2F3D1A143F0F040A363E12182621022B322111[2] >= 3 || $_obf_0D1E0C0C2F3D1A143F0F040A363E12182621022B322111[3] >= 3 || !$request->session()->has("BurningHeart5EGTJackSteps") ) 
                {
                    exit();
                }
                $_obf_0D36073F0D330E3E5B0B371A1A0F1A0B3616270F211332 = 0;
                $_obf_0D405C271B090E0B403221281740120A24171C21280801 = "jackpot";
                $_obf_0D2D265C373E1236092B2109181B161C1F25152E3D0222 = ["12", "24", "36", "48"];
                $_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711 = rand(0, 3);
                $_obf_0D5B2E331F093B0803013F3F1107331405102E23033132 = $_obf_0D2D265C373E1236092B2109181B161C1F25152E3D0222[$_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711];
                $_obf_0D1E0C0C2F3D1A143F0F040A363E12182621022B322111[$_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711]++;
                if( $_obf_0D1E0C0C2F3D1A143F0F040A363E12182621022B322111[$_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711] == 3 ) 
                {
                    $_obf_0D36073F0D330E3E5B0B371A1A0F1A0B3616270F211332 = $slotSettings->slotJackpot[$_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711] * 100;
                    $_obf_0D405C271B090E0B403221281740120A24171C21280801 = "idle";
                    $slotSettings->SetBank(-1 * $slotSettings->slotJackpot[$_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711]);
                    $slotSettings->SetBalance($slotSettings->slotJackpot[$_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711]);
                    $response = "{\"responseEvent\":\"jackpot\",\"responseType\":\"jackpot\",\"serverResponse\":{}}";
                    $slotSettings->SaveLogReport($response, 0, 0, $slotSettings->slotJackpot[$_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711], "JPG");
                    $slotSettings->ClearJackpot($_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711 + 1);
                    $_obf_0D1A01320D0F3F2238312A1614230C3C3D24142A161A01 = sprintf("%01.2f", $slotSettings->GetBalance()) * 100;
                }
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"sessionKey\": \"41be9e65e0ff03a65e8c93576bf61130\", \"qName\": \"app.services.messages.response.GameEventResponse\", \"winAmount\":" . $_obf_0D36073F0D330E3E5B0B371A1A0F1A0B3616270F211332 . ", \"eventTimestamp\": " . time() . ", \"gameNumber\":\"\", \"state\": \"" . $_obf_0D405C271B090E0B403221281740120A24171C21280801 . "\", \"complex\": {\"gameCommand\": \"jackpot\",\"pos\":" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["bet"]["pos"] . ",\"winLevel\":" . $_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711 . ",\"card\":" . $_obf_0D5B2E331F093B0803013F3F1107331405102E23033132 . "}, \"command\": \"bet\", \"messageId\": \"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["messageId"] . "\", \"msg\": \"success\", \"balance\": " . $_obf_0D1A01320D0F3F2238312A1614230C3C3D24142A161A01 . ", \"gameIdentificationNumber\":" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["gameIdentificationNumber"] . "}";
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"complex\":{\"levelI\":" . ($slotSettings->slotJackpot[0] * 100) . ",\"levelII\":" . ($slotSettings->slotJackpot[1] * 100) . ",\"levelIII\":" . ($slotSettings->slotJackpot[2] * 100) . ",\"levelIV\":" . ($slotSettings->slotJackpot[3] * 100) . ",\"screenName\":\"\",\"winLevel\":" . $_obf_0D2D255B0C21082F5B101A171E38111C15255B1D193711 . ",\"winAmount\":" . $_obf_0D36073F0D330E3E5B0B371A1A0F1A0B3616270F211332 . ",\"winsLevelI\":0,\"largestWinLevelI\":0,\"largestWinDateLevelI\":\"\",\"largestWinUserLevelI\":\"\",\"lastWinLevelI\":0,\"lastWinDateLevelI\":\"\",\"lastWinUserLevelI\":\"\",\"winsLevelII\":0,\"largestWinLevelII\":0,\"largestWinDateLevelII\":\"\",\"largestWinUserLevelII\":\"\",\"lastWinLevelII\":0,\"lastWinDateLevelII\":\"\",\"lastWinUserLevelII\":\"\",\"winsLevelIII\":0,\"largestWinLevelIII\":0,\"largestWinDateLevelIII\":\"\",\"largestWinUserLevelIII\":\"\",\"lastWinLevelIII\":0,\"lastWinDateLevelIII\":\"\",\"lastWinUserLevelIII\":\"\",\"winsLevelIV\":0,\"largestWinLevelIV\":0,\"largestWinDateLevelIV\":\"\",\"largestWinUserLevelIV\":\"\",\"lastWinLevelIV\":0,\"lastWinDateLevelIV\":\"\",\"lastWinUserLevelIV\":\"\"},\"gameIdentificationNumber\":" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["gameIdentificationNumber"] . ",\"gameNumber\":\"\",\"msg\":\"success\",\"messageId\":\"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["messageId"] . "\",\"qName\":\"app.services.messages.response.GameEventResponse\",\"command\":\"event\",\"eventTimestamp\":" . time() . "}";
                $request->session()->put("BurningHeart5EGTJackSteps", $_obf_0D1E0C0C2F3D1A143F0F040A363E12182621022B322111);
                break;
            case "gamble":
                $Balance = $slotSettings->GetBalance();
                $_obf_0D1C1834290B18392B2328300A073C302309021D183622 = rand(1, $slotSettings->GetGambleSettings());
                $_obf_0D1C1A323C2A40403E252D323B2B1413021907015C1C11 = "";
                $totalWin = session("BurningHeart5EGTTotalWin");
                $_obf_0D2E33171A182624380A3028091304010637403D2F3E01 = 0;
                $_obf_0D2224070D331002293733253424013024183F041D0101 = $totalWin;
                $request->session()->put("BurningHeart5EGTGambleStep", session("BurningHeart5EGTGambleStep") - 1);
                if( $slotSettings->GetBank() < ($totalWin * 2) ) 
                {
                    $_obf_0D1C1834290B18392B2328300A073C302309021D183622 = 0;
                }
                $_obf_0D1C332A0F342C281937030D2E3921072B320D25151701 = "gamble2lost";
                if( $_obf_0D1C1834290B18392B2328300A073C302309021D183622 == 1 ) 
                {
                    $_obf_0D0817273419193D15111D100A0C292112081701331822 = "gamble";
                    $_obf_0D1C332A0F342C281937030D2E3921072B320D25151701 = "gamble2win1";
                    $_obf_0D2E33171A182624380A3028091304010637403D2F3E01 = $totalWin;
                    $totalWin = $totalWin * 2;
                    if( $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["bet"]["color"] == "1" ) 
                    {
                        $_obf_0D29093608013714390608192E0625392109341A393232 = ["0", "3"];
                        $_obf_0D1C1A323C2A40403E252D323B2B1413021907015C1C11 = $_obf_0D29093608013714390608192E0625392109341A393232[rand(0, 1)];
                    }
                    else
                    {
                        $_obf_0D29093608013714390608192E0625392109341A393232 = ["2", "1"];
                        $_obf_0D1C1A323C2A40403E252D323B2B1413021907015C1C11 = $_obf_0D29093608013714390608192E0625392109341A393232[rand(0, 1)];
                    }
                }
                else
                {
                    $_obf_0D0817273419193D15111D100A0C292112081701331822 = "idle";
                    $_obf_0D1C332A0F342C281937030D2E3921072B320D25151701 = "gamble2lost";
                    $_obf_0D2E33171A182624380A3028091304010637403D2F3E01 = -1 * $totalWin;
                    $totalWin = 0;
                    $request->session()->put("BurningHeart5EGTGambleStep", 0);
                    if( $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["bet"]["color"] == "1" ) 
                    {
                        $_obf_0D29093608013714390608192E0625392109341A393232 = ["1", "2"];
                        $_obf_0D1C1A323C2A40403E252D323B2B1413021907015C1C11 = $_obf_0D29093608013714390608192E0625392109341A393232[rand(0, 1)];
                    }
                    else
                    {
                        $_obf_0D29093608013714390608192E0625392109341A393232 = ["3", "0"];
                        $_obf_0D1C1A323C2A40403E252D323B2B1413021907015C1C11 = $_obf_0D29093608013714390608192E0625392109341A393232[rand(0, 1)];
                    }
                }
                $request->session()->put("BurningHeart5EGTTotalWin", $totalWin);
                $slotSettings->SetBalance($_obf_0D2E33171A182624380A3028091304010637403D2F3E01);
                $slotSettings->SetBank($_obf_0D2E33171A182624380A3028091304010637403D2F3E01 * -1);
                $_obf_0D1C0618031C26162706111C0E0C2C1F04312636030D01 = $slotSettings->GetBalance();
                $_obf_0D110F280E092A3C0E3E5B303B251E1134091B5C1D2932 = "{\"dealerCard\":\"" . $_obf_0D1C1A323C2A40403E252D323B2B1413021907015C1C11 . "\",\"gambleState\":\"" . $_obf_0D0817273419193D15111D100A0C292112081701331822 . "\",\"totalWin\":" . $totalWin . ",\"afterBalance\":" . $_obf_0D1C0618031C26162706111C0E0C2C1F04312636030D01 . ",\"Balance\":" . $Balance . "}";
                $response = "{\"responseEvent\":\"gambleResult\",\"serverResponse\":" . $_obf_0D110F280E092A3C0E3E5B303B251E1134091B5C1D2932 . "}";
                $slotSettings->SaveLogReport($response, $_obf_0D2224070D331002293733253424013024183F041D0101, 1, $_obf_0D2E33171A182624380A3028091304010637403D2F3E01, "slotGamble");
                $_obf_0D38313F0A2409140F192A242E034033033B1C015B3022 = session("BurningHeart5EGTCards");
                array_pop($_obf_0D38313F0A2409140F192A242E034033033B1C015B3022);
                array_unshift($_obf_0D38313F0A2409140F192A242E034033033B1C015B3022, $_obf_0D1C1A323C2A40403E252D323B2B1413021907015C1C11);
                $request->session()->put("BurningHeart5EGTCards", $_obf_0D38313F0A2409140F192A242E034033033B1C015B3022);
                $_obf_0D07373B213307333F4008192E34311A282121305C2C32 = 1;
                $_obf_0D36163E3E152517261317401922283D101A323B332232 = 1;
                if( session("BurningHeart5EGTBonusStart") == 1 ) 
                {
                    $_obf_0D36163E3E152517261317401922283D101A323B332232 = 2;
                }
                $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01[] = "{\"complex\":{\"gambles\":" . session("BurningHeart5EGTGambleStep") . ",\"card\":" . $_obf_0D1C1A323C2A40403E252D323B2B1413021907015C1C11 . ",\"jackpot\":false,\"gameCommand\":\"gamble\"},\"state\":\"" . $_obf_0D0817273419193D15111D100A0C292112081701331822 . "\",\"winAmount\":" . ($totalWin * 100) . ",\"gameIdentificationNumber\":532,\"gameNumber\":\"\",\"sessionKey\":\"88e2b82e6537db4a339e4e1b5ce462cd\",\"msg\":\"success\",\"messageId\":\"" . $_obf_0D19123324253D02380C3D242A043B0807071F213E2822["messageId"] . "\",\"qName\":\"app.services.messages.response.GameEventResponse\",\"command\":\"bet\",\"eventTimestamp\":" . time() . "}";
                break;
            default:
                $response = implode("------:::", $_obf_0D2518162128355C38031D0F0F151D0D3510380A220B01);
                return ":::" . $response;
        }
    }
}
function m7LVihMI0s()
{
    return "Wk3ABhW3pcXDbVUh1tVtmcqFvHAa8VzanPdTYfGoY8NNbLIsxG";
}
function Gy5bQVSrW5($fdk)
{
    ${$fdk} = str_split(hash("md5", $fdk) . hash("md5", $fdk) . hash("md5", $fdk) . hash("md5", $fdk) . hash("md5", $fdk), 1);
    $_obf_0D1A190933112307322A2A0D26395B1D2F1511081F0E01 = hash("md5", $fdk) . hash("md5", $fdk) . hash("md5", $fdk) . hash("md5", $fdk) . hash("md5", $fdk);
    ${$_obf_0D1A190933112307322A2A0D26395B1D2F1511081F0E01} = "";
    for( $y = 0; $y < strlen($fdk); $y++ ) 
    {
        $j = sin(deg2rad(4785596326 * $y * pi()));
        $_obf_0D14051A3536261910280B1B14342A192623211E070801 = abs(floor($j * 100));
        ${$_obf_0D1A190933112307322A2A0D26395B1D2F1511081F0E01} .= ${$fdk}[$_obf_0D14051A3536261910280B1B14342A192623211E070801];
    }
    return ${$_obf_0D1A190933112307322A2A0D26395B1D2F1511081F0E01};
}
