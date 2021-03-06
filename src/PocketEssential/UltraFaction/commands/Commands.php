<?php
# _    _ _ _             ______         _   _                 
#| |  | | | |           |  ____|       | | (_)                
#| |  | | | |_ _ __ __ _| |__ __ _  ___| |_ _  ___  _ __  ___ 
#| |  | | | __| '__/ _` |  __/ _` |/ __| __| |/ _ \| '_ \/ __|
#| |__| | | |_| | | (_| | | | (_| | (__| |_| | (_) | | | \__ \
# \____/|_|\__|_|  \__,_|_|  \__,_|\___|\__|_|\___/|_| |_|___/
#
# Made by PocketEssential Copyright 2016 ©
#
# This is a public software, you cannot redistribute it a and/or modify any way
# unless otherwise given permission to do so.
#
# Author: The PocketEssential Team
# Link: https://github.com/PocketEssential
#
#|------------------------------------------------- UltraFaction -------------------------------------------------|
#| - If you want to suggest/contribute something, read our contributing guidelines on our Github Repo (Link Below)|
#| - If you find an issue, please report it at https://github.com/PocketEssential/UltraFaction/issues             |
#|----------------------------------------------------------------------------------------------------------------|
namespace PocketEssential\UltraFaction\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\Player;

use PocketEssential\UltraFaction\UltraFaction;

class Commands implements CommandExecutor
{
    public function __construct(UltraFaction $plugin){
        $this->plugin = $plugin;
    }
    public function onCommand(CommandSender $sender, Command $command, $labels, array $args)
    {
        $cmd = strtolower($command);
        if ($cmd == "f") {
            if (isset($args[0])) {
                switch ($args[0]) {
                    case "help":

                        $sender->sendMessage("----- UltraFaction Help -----");
                        $sender->sendMessage("// Todo");
                        break;

                    /*
                     _____                _
                   /  __ \              | |
                   | /  \/_ __ ___  __ _| |_ ___
                   | |   | '__/ _ \/ _` | __/ _ \
                   | \__/\ | |  __/ (_| | ||  __/
                    \____/_|  \___|\__,_|\__\___|


                     */
                    case "create":
                        if ($args[1] == null && $sender instanceof Player) {
                            $sender->sendMessage("/f create <FactionName>");
                        }

                        if($args[1] != null && $sender instanceof Player){
                            $this->plugin->createFaction($sender, $args[1]);
                        }
                        break;

                    /*
                    ______                    _       _   _
                    |  _  \                  (_)     | | (_)
                    | | | |___  ___  ___ _ __ _ _ __ | |_ _  ___  _ __
                    | | | / _ \/ __|/ __| '__| | '_ \| __| |/ _ \| '_ \
                    | |/ /  __/\__ \ (__| |  | | |_) | |_| | (_) | | | |
                    |___/ \___||___/\___|_|  |_| .__/ \__|_|\___/|_| |_|
                                               | |
                                               |_|
                     */

                    case "description":
                    case "setdescription":
                        $player = $sender;
                        if (!$this->plugin->IsPlayerInFaction($player)) {
                            $sender->sendMessage(UltraFaction::PREFIX . " You need to be in a faction to do this");
                        }
                        if ($args[1] == null && $sender instanceof Player) {
                            $sender->sendMessage(UltraFaction::PREFIX . " /f setdescription <Description>");
                        }
                        if ($this->plugin->IsPlayerInFaction($player) && $args[1] != null) {

                            $sender->sendMessage(UltraFaction::PREFIX . " Faction has been created!");

                            // Todo other events
                            break;
                        }

                    /*
                    ______
                    | ___ \
                    | |_/ /___ _ __   __ _ _ __ ___   ___
                    |    // _ \ '_ \ / _` | '_ ` _ \ / _ \
                    | |\ \  __/ | | | (_| | | | | | |  __/
                    \_| \_\___|_| |_|\__,_|_| |_| |_|\___|


                     */
                    case "rename":
                    case "changename":
                        $player = $sender;
                        if ($args[1] == null && $sender instanceof Player) {
                            $sender->sendMessage(UltraFaction::PREFIX . " /f rename <Name>");
                        }
                        if (!$this->plugin->IsPlayerInFaction($player)) {
                            $sender->sendMessage(UltraFaction::PREFIX . " You need to be in a faction to do this");
                        }
                        if($this->plugin->IsPlayerInFaction($player) && $args[1] !== null){
                            //todo
                            $sender->sendMessage(UltraFaction::PRIFEX . " Faction has successfully renamed!");
                        }
                        break;
                    case "war":
                        //todo
                        break;
                    case "map":
                        //todo
                        break;
                    case "ally":
                        //todo
                        break;
                    case "unally":
                        //todo
                        break;
                    case "claim":
                        //todo
                        break;
                    case "invite":
                        //todo
                        break;
                    case "kick":
                        //todo
                        break;
                    case "leave":
                        $this->plugin->removePlayerFromFaction($sender, $this->plugin->getFactionName($sender));
                        $sender->sendMessage( UltraFaction::PRIFEX . " You have leaved the faction");
                        break;
                    case "delete":
                        //todo
                        break;
                    case "deny":
                        //todo
                        break;
                }
            }
        }
    }
}
