# WordPress Skeleton

Setup a new WordPress installation via Composer

## Requirements

PHP 5.3.2+

## Prerequisites

Install Composer by running `curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer` on Linux/Unix/OSX

## Installation

```bash
$ composer create-project wpscholar/wp-skeleton {directory}
$ cd {directory}
$ mv .env.example .env
```

Replace `{directory}` above with the folder name of your new project.

## Configuration

Open up the `.env` file and edit your database credentials.