<?php

namespace roi611\lightredstonelamp;

use pocketmine\plugin\PluginBase;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;

use pocketmine\block\RedStoneLamp;

class Main extends PluginBase implements Listener {

    public function onEnable():void{ $this->getServer()->getPluginManager()->registerEvents($this, $this); }

    public function onTap(PlayerInteractEvent $event){

        if($event->isCancelled() || $event->getAction() === PlayerInteractEvent::LEFT_CLICK_BLOCK) return;

        $block = $event->getBlock();
        $p = $block->getPosition();

        if($block instanceof RedStoneLamp){
            $block->setPowered(!$block->isPowered());
            $p->getWorld()->setBlock($p, $block);
        }

    }

}