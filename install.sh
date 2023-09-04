#!/bin/bash

# Colors
color_reset='\033[0m'

# Set the container name
container_name="desafio-gesuas"

# Set the commands to be executed
composer_install_command="composer install"

chmod_command="chmod 777 -R storage/"

# Set the env filenames
env_file="dg.env"

# Function to prompt the user for input and execute a command
execute_command() {
  command=$1
  prompt=$2
  while true; do
    read -rp "$prompt " yn
    case $yn in
      [Yy]* ) docker exec -it "$container_name" sh -c "$command"; break;;
      * ) break;;
    esac
  done
}

echo
cat <<\EOF
 ____                   __ _          ____ _____ ____  _   _   _    ____
|  _ \  ___  ___  __ _ / _(_) ___    / ___| ____/ ___|| | | | / \  / ___|
| | | |/ _ \/ __|/ _` | |_| |/ _ \  | |  _|  _| \___ \| | | |/ _ \ \___ \
| |_| |  __/\__ \ (_| |  _| | (_) | | |_| | |___ ___) | |_| / ___ \ ___) |
|____/ \___||___/\__,_|_| |_|\___/   \____|_____|____/ \___/_/   \_\____/

EOF

printf "\033[1;30m\033[42mDone... %b\n" "$color_reset"

echo
echo "╭─────────────────────────────╮"
printf "|〈〈〈 \033[1;37mDocker Build...%b 〉〉〉|\n" "$color_reset"
echo "╰─────────────────────────────╯"
echo


# Prompt the user to rebuild the container
if command -v docker-compose >/dev/null 2>&1; then
  while true; do
    read -rp "Rebuild container [y/N]? " yn
    case $yn in
      [Yy]* )
        # Rebuild the container
        cd docker
        docker-compose up -d --build
        cd ..
        break;;
      * )
        # Start the container without rebuilding
        cd docker
        docker-compose up -d
        cd ..
        break;;
    esac
  done
else
   while true; do
      read -rp "Rebuild container [y/N]? " yn
      case $yn in
        [Yy]* )
          # Rebuild the container
          cd docker
          docker compose up -d --build
          cd ..
          break;;
        * )
          # Start the container without rebuilding
          cd docker
          docker compose up -d
          cd ..
          break;;
      esac
  done
fi

# Execute the commands inside the container
docker exec -it "$container_name" sh -c "$composer_install_command"

printf "\033[1;30m\033[42mDone... %b\n" "$color_reset"

echo
printf "\033[1;30m\033[42m All done... %b\n" "$color_reset"
