# ewww-server

**THIS PROJECT IS NOT AFFILIATED WITH EWWW IN ANY WAY!**

Sets up a basic image minification server for DIY (read: no paid API access
required) image minification on Wordpress when your host blocks exec
(I'm looking at you WPEngine).

Implements the API used by ewww-image-optimizer-cloud for Wordpress.

## Setup

To install ewww-server, you'll need a server running Apache2 and PHP7. You will also need to have SSL enabled.

Install the image optimizers using the following commands as root (for Debian Linux):

```
apt-get install -y php php-gd php-dom
apt-get install -y advancecomp pngcrush gifsicle jpegoptim
apt-get install -y libimage-exiftool-perl
apt-get install -y imagemagick pngnq tar unzip libpng-dev git
apt-get install -y optipng pngquant
apt-get install -y libjpeg-turbo-progs
```

You'll also need to install pngout (replace x86_64 with your architecture if required):

```
cd /tmp
wget http://static.jonof.id.au/dl/kenutils/pngout-20130221-linux-static.tar.gz && tar xvf pngout-20130221-linux-static.tar.gz
mv pngout-20130221-linux-static/x86_64/pngout-static /usr/bin/pngout
```

Then, simply extract this package into your webroot, and enjoy!

## Plugin Setup

Run the following two commands in bash in the ewww-image-optimizer-cloud
plugin directory (replace 10.0.0.1 with your server IP):

```
find . -type f -exec sed -i 's/optimize.exactlywww.com/10.0.0.1/' {} \;
find . -type f -exec sed -i 's/stats.exactlywww.com/10.0.0.1/' {} \;
```

Then, zip and install the plugin. Enter anything for the API key. Bulk Optimize should work fine after that!

These commands were last tested on plugin version 4.0.3.

## Other Notes

This package **ONLY** does the image minification! Options from Wordpress
are ignored, and all non-image-optimizing routes are mocked (and will not
return real data).

JPEG image rotation correction has not yet been implemented.

There's a composer package in the v2 directory, however, I've gone ahead
and committed the vendor files, so there's no need to run composer again.

Here's what the plugin will look like when optimizing:

![Demo](https://i.imgur.com/ggRmk1X.png)

## License

(c) 2017 Justin Paulin

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

