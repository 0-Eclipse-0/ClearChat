<?php
namespace lostteam\clearchat;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat;

class cc extends PluginBase implements Listener {

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("[ClearChat] Enabling...");
        $this->getLogger()->info("[ClearChat] Enabled");
    }

    public function onPlayerChat(PlayerChatEvent $event){
        $msg = $event->getMessage();
        $player = $event->getPlayer();

        $cursewords = array("fuck","fu","ck","fuc","uck","fu*k","f*ck","shit","poop","stupid","dumb","noob","anal","anus","arse","ass","ballsack","bastard","bitch","biatch","blowjob","blow job","boner"",boob","butt","buttplug","cock","crap","cunt","dick","dildo"," dyke","Goddamn","God damn","homo","jerk","nigger","nigga","omg","penis","piss","pussy","queer","scrotum","sex","s hit","sh1t","slut","vagina","wank","whore","::");
        
        $advertwords = array(".leet","leet.",".cc","a1","a2","a3","a4","a5","a6","a7","a8","a9","b1","b2","b3","b4","b5","b6","b7","b8","b9","c1","c2","c3","c4","c5","c6","c7","c8","c9","192");

        foreach($this->cursewords as $word) {
            if(strpos($this->cursewords, $word) !== false && !($player->hasPermission("unblock.cmd"))){
                $event->setCancelled();
                $event->getEntity()->kick(TextColor::RED."Do not Curse!", false);
            }
        }

        foreach($this->advertwords as $word) {
            if(strpos($this->advertwords, $word) !== false && !($player->hasPermission("unblock.cmd"))){
                $event->setCancelled();
                $event->getEntity()->kick(TextFormat::RED."Do not Advertise!", false);
            }
        }
    }
}
?>
