mkdir limg mimg simg
mogrify -path simg/ -resize 414x *.jpg
mogrify -path mimg/ -resize 756 *.jpg
mogrify -path limg/ -resize 1550x *.jpg
