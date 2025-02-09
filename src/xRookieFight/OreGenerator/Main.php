<?php

namespace xRookieFight\OreGenerator;

use pocketmine\block\BlockTypeIds;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\block\BlockFormEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{

    function onEnable(): void
    {
        $this->getServer()->getpluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }

    function onRatio(BlockFormEvent $event): void
    {
        $state = $event->getNewState();
        $rand = rand(1, $this->getConfig()->get("ratio"));
        if ($state->getTypeId() == BlockTypeIds::COBBLESTONE or BlockTypeIds::STONE){
                $event->cancel();
                $world = $event->getBlock()->getPosition()->getWorld();
                switch ($rand){
                    case 5:
                        $world->setBlockAt(
                            $event->getBlock()->getPosition()->getX(),
                            $event->getBlock()->getPosition()->getY(),
                            $event->getBlock()->getPosition()->getZ(),
                            VanillaBlocks::IRON_ORE()
                        );
                        break;
                    case 6:
                        $world->setBlockAt(
                            $event->getBlock()->getPosition()->getX(),
                            $event->getBlock()->getPosition()->getY(),
                            $event->getBlock()->getPosition()->getZ(),
                            VanillaBlocks::COAL_ORE()
                        );
                        break;
                    case 7:
                        $world->setBlockAt(
                            $event->getBlock()->getPosition()->getX(),
                            $event->getBlock()->getPosition()->getY(),
                            $event->getBlock()->getPosition()->getZ(),
                            VanillaBlocks::GOLD_ORE()
                        );
                        break;
                    case 8:
                        $world->setBlockAt(
                            $event->getBlock()->getPosition()->getX(),
                            $event->getBlock()->getPosition()->getY(),
                            $event->getBlock()->getPosition()->getZ(),
                            VanillaBlocks::DIAMOND_ORE()
                        );
                        break;
                        default:
                            $world->setBlockAt(
                                $event->getBlock()->getPosition()->getX(),
                                $event->getBlock()->getPosition()->getY(),
                                $event->getBlock()->getPosition()->getZ(),
                                $event->getNewState()
                            );
                            break;
                }
        }
        }
}