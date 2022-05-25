#!/usr/bin/env bash

while IFS='' read -r sectionname || [[ -n "$sectionname" ]]; do
    file="./templates/components/$sectionname.php"
    if [ -f "$file" ]
    then
	    echo "$file exist."
    else
	    echo "<p>Content from /templates/components/$sectionname.php </p>" > ./templates/components/$sectionname.php
        echo " " > ./templates/assets/scripts/section/$sectionname.js
        echo " " > ./templates/assets/styles/section/$sectionname.scss
        echo "You still need to include new scss file into templates/assets/styles/components.scss;"
    fi

done < "$1"
