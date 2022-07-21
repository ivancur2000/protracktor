#!/bin/sh

# Some packages like spatie/laravel-medialibrary needs Imagick installed.
# Uncomment the following lines to install Imagick on each deploy.

set +e

sudo yum install -y unzip