#!/bin/sh

echo -n "Enter your desired URL: "
read url
echo "Downloading..."
wget -nd -r -l 1 -P astarinatyasr -A jpg  $url
echo "====================Download succeed===================="
echo "Backing up..."
rsync -a astarinatyasr backup
echo "====================Back up succeed===================="
echo "> Finished scraping $url"
