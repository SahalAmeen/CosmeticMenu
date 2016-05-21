<?php

Namespace BoxOfDevs\Cosmetic;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\network\protocol\UseItemPacket;
Use pocketmine\math\Vector3;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\entity\ProjectileHitEvent;
use pocketmine\event\entity\ProjectileLaunchEvent;
use pocketmine\level\particle\RedstoneParticle;
use pocketmine\utils\Config;
use pocketmine\level\Level;
use pocketmine\level\particle\HugeExplodeParticle;
use pocketmine\level\particle\WaterParticle;
use pocketmine\level\particle\AngryVillagerParticle;
use pocketmine\entity\Arrow;
use pocketmine\entity\Snowball;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\inventory\Inventory;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\block\Air;
use pocketmine\network\protocol\AddItemEntityPacket;

Class Main extends PluginBase implements Listener{
       //EnderPearl
/**@var Item*/
	private $item;
	/**@var int*/
	protected $damage = 0;
	
     public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§aCosmeticMenu by BoxOfDevs loaded ;D!");
        }
       public function onPacketReceived(DataPacketReceiveEvent $event){
            $pk = $event->getPacket();
            $player = $event->getPlayer();
            if($pk instanceof UseItemPacket and $pk->face === 0xff) {
             $block = $player->getLevel()->getBlock($player->floor()->subtract(0, 1));
            $item = $player->getInventory()->getItemInHand();
            $pos = new Vector3($player->getX() + 1, $player->getY() + 1, $player->getZ());
            $particle = new RedstoneParticle($pos, 5);  
            $particle2 = new HugeExplodeParticle($pos, 5);
            $particle3 = new WaterParticle($pos, 12);
            $particle4 = new AngryVillagerParticle($pos, 5);
            $level = $player->getLevel();
if($item->getId() == 341){
     $level->addParticle($particle);
     $level->addParticle($particle2);
     $level->addParticle($particle3);
     $level->addParticle($particle4);
   } 
   //Leaper
            if( $block->getId() === 0){
$player->sendTIP("§cPlease wait");
return true;
   }
      
       if($item->getId() == 258){
           $yaw = $player->yaw;
           if (0 <= $yaw and $yaw < 22.5) {
			      $player->knockBack($player, 0, 0, 1, 1.5);
           } elseif (22.5 <= $yaw and $yaw < 67.5) {
                    $player->knockBack($player, 0, -1, 1, 1.5);
           } elseif (67.5 <= $yaw and $yaw < 112.5) {
                    $player->knockBack($player, 0, -1, 0, 1.5);
           } elseif (112.5 <= $yaw and $yaw < 157.5) {
                    $player->knockBack($player, 0, -1, -1, 1.5);
           } elseif (157.5 <= $yaw and $yaw < 202.5) {
                    $player->knockBack($player, 0, 0, -1, 1.5);
           } elseif (202.5 <= $yaw and $yaw < 247.5) {
                    $player->knockBack($player, 0, 1, -1, 1.5);
           } elseif (247.5 <= $yaw and $yaw < 292.5) {
                   $player->knockBack($player, 0, 1, 0, 1.5);
           } elseif (292.5 <= $yaw and $yaw < 337.5) {
                    $player->knockBack($player, 0, 1, 1, 1.5);
           } elseif (337.5 <= $yaw and $yaw < 360.0) {
                    $player->knockBack($player, 0, 0, 1, 1.5);
           }
      
$player->sendPopup("§aUsed Leap!");
   }
//Egg Launcher
if($item->getId() == 346){
						$nbt = new CompoundTag ( "", [ 
				"Pos" => new ListTag ( "Pos", [ 
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z ) 
				] ),
				"Motion" => new ListTag ( "Motion", [
                                                new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ) 
				] ),
				"Rotation" => new ListTag ( "Rotation", [ 
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch ) 
				] ) 
		] );
                                                
                  
		     $motion = 2 % 100;
		$f = $motion;
		$snowball = Entity::createEntity ( "Egg", $player->chunk, $nbt, $player );
		$snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );
		$snowball->spawnToAll ();
	}
    if($item->getId() == 332){
						$nbt = new CompoundTag ( "", [ 
				"Pos" => new ListTag ( "Pos", [ 
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z ) 
				] ),
				"Motion" => new ListTag ( "Motion", [
                                                new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ) 
				] ),
				"Rotation" => new ListTag ( "Rotation", [ 
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch ) 
				] ) 
		] );
                                                
                  
		     $motion = 2 % 100;
		$f = $motion;
		$snowball = Entity::createEntity ( "Snowball", $player->chunk, $nbt, $player );
		$snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );
		$snowball->spawnToAll ();
    }
//Items
   if($item->getId() == 347){
      $player->getInventory()->removeItem(Item::get(ITEM::CLOCK));
      $player->getInventory()->addItem(Item::get(ITEM::MINECART));
      $player->getInventory()->addItem(Item::get(ITEM::GLOWSTONE_DUST));
      $player->getInventory()->addItem(Item::get(ITEM::DIAMOND_HELMET));
}
//Armours
if($item->getId() == 310){
      $player->getInventory()->removeItem(Item::get(ITEM::DIAMOND_HELMET));
      $player->getInventory()->removeItem(Item::get(ITEM::MINECART));
      $player->getInventory()->removeItem(Item::get(ITEM::GLOWSTONE_DUST));
      $player->getInventory()->addItem(Item::get(ITEM::DIAMOND));
      $player->getInventory()->addItem(Item::get(ITEM::IRON_INGOT));
      $player->getInventory()->addItem(Item::get(ITEM::GOLD_INGOT));
      $player->getInventory()->addItem(Item::get(ITEM::GUNPOWDER));
      $player->getInventory()->addItem(Item::get(ITEM::LEATHER));
      }
      //Diamond Armour
      if($item->getid() == 264){
      $player->getInventory()->removeItem(Item::get(ITEM::DIAMOND));
      $player->getInventory()->removeItem(Item::get(ITEM::CLOCK));
      $player->getInventory()->removeItem(Item::get(ITEM::IRON_INGOT));
      $player->getInventory()->removeItem(Item::get(ITEM::GOLD_INGOT));
       $player->getInventory()->removeItem(Item::get(ITEM::GUNPOWDER));
       $player->getInventory()->removeItem(Item::get(ITEM::LEATHER));
       $player->getInventory()->addItem(Item::get(ITEM::BED));
       $player->getInventory()->setHelmet(Item::get(ITEM::DIAMOND_HELMET));
       $player->getInventory()->setChestplate(Item::get(ITEM::DIAMOND_CHESTPLATE));
       $player->getInventory()->setLeggings(Item::get(ITEM::DIAMOND_LEGGINGS));
       $player->getInventory()->setBoots(Item::get(ITEM::DIAMOND_BOOTS));
       }
             //Iron Armour
      if($item->getid() == 265){
      $player->getInventory()->removeItem(Item::get(ITEM::DIAMOND));
      $player->getInventory()->removeItem(Item::get(ITEM::CLOCK));
      $player->getInventory()->removeItem(Item::get(ITEM::IRON_INGOT));
      $player->getInventory()->removeItem(Item::get(ITEM::GOLD_INGOT));
       $player->getInventory()->removeItem(Item::get(ITEM::GUNPOWDER));
       $player->getInventory()->removeItem(Item::get(ITEM::LEATHER));
       $player->getInventory()->addItem(Item::get(ITEM::BED));
       $player->getInventory()->setHelmet(Item::get(ITEM::IRON_HELMET));
       $player->getInventory()->setChestplate(Item::get(ITEM::IRON_CHESTPLATE));
       $player->getInventory()->setLeggings(Item::get(ITEM::IRON_LEGGINGS));
       $player->getInventory()->setBoots(Item::get(ITEM::IRON_BOOTS));
       }
             //Gold Armour
      if($item->getid() == 266){
      $player->getInventory()->removeItem(Item::get(ITEM::DIAMOND));
      $player->getInventory()->removeItem(Item::get(ITEM::CLOCK));
      $player->getInventory()->removeItem(Item::get(ITEM::IRON_INGOT));
      $player->getInventory()->removeItem(Item::get(ITEM::GOLD_INGOT));
       $player->getInventory()->removeItem(Item::get(ITEM::GUNPOWDER));
       $player->getInventory()->removeItem(Item::get(ITEM::LEATHER));
       $player->getInventory()->addItem(Item::get(ITEM::BED));
       $player->getInventory()->setHelmet(Item::get(ITEM::GOLD_HELMET));
       $player->getInventory()->setChestplate(Item::get(ITEM::GOLD_CHESTPLATE));
       $player->getInventory()->setLeggings(Item::get(ITEM::GOLD_LEGGINGS));
       $player->getInventory()->setBoots(Item::get(ITEM::GOLD_BOOTS));
       }
    //Chain Armour
      if($item->getid() == 289){
      $player->getInventory()->removeItem(Item::get(ITEM::DIAMOND));
      $player->getInventory()->removeItem(Item::get(ITEM::CLOCK));
      $player->getInventory()->removeItem(Item::get(ITEM::IRON_INGOT));
      $player->getInventory()->removeItem(Item::get(ITEM::GOLD_INGOT));
       $player->getInventory()->removeItem(Item::get(ITEM::GUNPOWDER));
       $player->getInventory()->removeItem(Item::get(ITEM::LEATHER));
       $player->getInventory()->addItem(Item::get(ITEM::BED));
       $player->getInventory()->setHelmet(Item::get(ITEM::CHAIN_HELMET));
       $player->getInventory()->setChestplate(Item::get(ITEM::CHAIN_CHESTPLATE));
       $player->getInventory()->setLeggings(Item::get(ITEM::CHAIN_LEGGINGS));
       $player->getInventory()->setBoots(Item::get(ITEM::CHAIN_BOOTS));
       }
       //Leather Armour
      if($item->getid() == 334){
      $player->getInventory()->removeItem(Item::get(ITEM::DIAMOND));
      $player->getInventory()->removeItem(Item::get(ITEM::CLOCK));
      $player->getInventory()->removeItem(Item::get(ITEM::IRON_INGOT));
      $player->getInventory()->removeItem(Item::get(ITEM::GOLD_INGOT));
       $player->getInventory()->removeItem(Item::get(ITEM::GUNPOWDER));
       $player->getInventory()->removeItem(Item::get(ITEM::LEATHER));
       $player->getInventory()->addItem(Item::get(ITEM::BED));
       $player->getInventory()->setHelmet(Item::get(ITEM::LEATHER_CAP));
       $player->getInventory()->setChestplate(Item::get(ITEM::LEATHER_TUNIC));
       $player->getInventory()->setLeggings(Item::get(ITEM::LEATHER_PANTS));
       $player->getInventory()->setBoots(Item::get(ITEM::LEATHER_BOOTS));
       }     
//Gadgets
   if($item->getid() == 328){
       $player->getInventory()->removeItem(Item::get(ITEM::CLOCK));
      $player->getInventory()->removeItem(Item::get(ITEM::MINECART));
      $player->getInventory()->removeItem(Item::get(ITEM::GLOWSTONE_DUST));
      $player->getInventory()->removeItem(Item::get(ITEM::DIAMOND_HELMET));
      $player->getInventory()->addItem(Item::get(ITEM::FISHING_ROD));
      $player->getInventory()->addItem(Item::get(ITEM::SLIMEBALL));
      $player->getInventory()->addItem(Item::get(ITEM::IRON_AXE));     
      $player->getInventory()->addItem(Item::get(ITEM::SNOWBALL, 0, 16));     
      $player->getInventory()->addItem(Item::get(ITEM::BED));     
}
//Partical
   if($item->getid() == 348){
       $player->getInventory()->removeItem(Item::get(ITEM::CLOCK));
      $player->getInventory()->removeItem(Item::get(ITEM::MINECART));
      $player->getInventory()->removeItem(Item::get(ITEM::GLOWSTONE_DUST));
      $player->getInventory()->removeItem(Item::get(ITEM::DIAMOND_HELMET));
      $player->getInventory()->addItem(Item::get(ITEM::BED));
      $player->getInventory()->addItem(Item::get(ITEM::DYE,4,1));
      $player->getInventory()->addItem(Item::get(ITEM::DYE,14,1));
      $player->getInventory()->addItem(Item::get(ITEM::DYE,1,1));
      $player->getInventory()->addItem(Item::get(ITEM::DYE,15,1));
}
//Back
   if($item->getId() == 355){
      $player->getInventory()->removeItem(Item::get(ITEM::BED));
      $player->getInventory()->removeItem(Item::get(ITEM::SLIMEBALL));
      $player->getInventory()->removeItem(Item::get(ITEM::SNOWBALL));
      $player->getInventory()->removeItem(Item::get(ITEM::IRON_AXE));
      $player->getInventory()->removeItem(Item::get(ITEM::MINECART));
      $player->getInventory()->removeItem(Item::get(ITEM::GLOWSTONE));
      $player->getInventory()->removeItem(Item::get(ITEM::FISHING_ROD));
      $player->getInventory()->removeItem(Item::get(ITEM::DYE,15,1));
      $player->getInventory()->removeItem(Item::get(ITEM::DYE,4,1));
      $player->getInventory()->removeItem(Item::get(ITEM::DYE,1,1));
      $player->getInventory()->removeItem(Item::get(ITEM::DYE,14,1));
      $player->getInventory()->addItem(Item::get(ITEM::CLOCK));
      $player->getInventory()->setHelmet(Item::get(ITEM::AIR));
      $player->getInventory()->setChestplate(Item::get(ITEM::AIR));
      $player->getInventory()->setLeggings(Item::get(ITEM::AIR));
      $player->getInventory()->setBoots(Item::get(ITEM::AIR));
}
}
}
	public function onPlayerItemHeldEvent(PlayerItemHeldEvent $e){
		$i = $e->getItem();
		$p = $e->getPlayer();
	 //ItemNames
     if($i->getId() == 347){
     $p->sendPopup("§l§dCosmetic§eMenu");
     }
     //6s
     if($i->getId() == 328){
     $p->sendPopup("§l§6Gadgets");
     }
     if($i->getId() == 346){
     $p->sendPopup("§l§6Egg§bLauncher");
     }
     if($i->getId() == 332){
     $p->sendPopup("§l§6EnderPearl");
     }
     if($i->getId() == 258){
     $p->sendPopup("§l§bBunnyHop");
     }
     if($i->getId() == 288){
     $p->sendPopup("§l§6FlyTime");
     }
     if($i->getId() == 331){
     $p->sendPopup("§l§dParticle§eBomb");
     }
     if($i->getId() == 310){
     $p->sendPopup("§l§6Armours");
     }
     if($i->getId() == 352){
     $p->sendPopup("§l§6LightingStick");
     } 
     //Partical
     if($i->getId() == 348){
     $p->sendPopup("§l§bParticals");
     }
     if($i->getId() == 351 && $i->getDamage() == 4){
     $p->sendPopup("§l§6Water");
     }
     if($i->getId() == 351 && $i->getDamage() == 14){
     $p->sendPopup("§l§6Fire");
     }
     if($i->getId() == 351 && $i->getDamage() == 1){
     $p->sendPopup("§l§6Hearts");
     }
     if($i->getId() == 351 && $i->getDamage() == 15){
     $p->sendPopup("§l§6Smoke");
     }
     //Back
     if($i->getId() == 355){     
     $p->sendPopup("§l§7Back...");  
     } 
   }
    
    public function onProjectileHit(ProjectileHitEvent $event) {
        $snowball = $event->getEntity();
            $loc = $snowball->getLocation();
            if($snowball->shootingEntity instanceof Player and $snowball instanceof Snowball) { // if the player is online
                $snowball->shootingEntity->teleport(new Vector3($loc->x, $loc->y, $loc->z), $loc->yaw, $loc->pitch);
            }
    }
	public function spawnTo(Player $player) {
		$pk = new AddItemEntityPacket;
		$pk->eid = $this->getID();
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->item = Item::get(Item::EGG);
		$pk->speedX = $this->motionX;
		$pk->speedY = $this->motionY;
		$pk->speedZ = $this->motionZ;
		$player->dataPacket($pk);

		$this->item = $pk->item;

		Entity::spawnTo($player);
	}
/**
* BunnyHop-Little is asigned on this
* FlyPower
* LightingStick
* Particals-Emerald is asigned on this
*/
}
