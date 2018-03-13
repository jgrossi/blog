# blog.jgrossi.com

> This is the code used on my personal blog on https://blog.jgrossi.com.

![Blog screenshot](http://snaps.jgrossi.com/2018-03-13-drfrjgjuej.png)

## Structure

This blog uses Composer for dependencies. The only dependency the blog has for now is `phpdovenv` package. So please run:

```
composer install
```

### Configuration

Rename `.env.example` to `.env` and  onfigure it with your own credentials, like database, URL, etc.

Inside the `/public` folder you'll see a basic WordPress installation, except the fact the `wp-config.php` is configured to include the `/bootstrap.php` file and use `getenv()` to get environment variables from `phpdotenv` package.

## Child theme

I use the [twentyfifteen theme](https://wordpress.org/themes/twentyfifteen/) with some modifications.

### CSS changes

I decrease the font size a bit, so you can see some changes on `twentyfifteen-child/style.css` file.

I also decrease the logo size, which I'm using with my profile image.

I also created a new `.post-date` section, just below the title, to display the published and updated date. You can use both dates or just the published one.

### Behavior changes

I changed how the featured image is displayed. I overrided the `twentyfifteen_post_thumbnail()` function on `twentyfifteen-child/functions.php` to send the image to below the title, using by default the `large` size, adding also some custom CSS rules.

## Licence

[MIT License](http://jgrossi.mit-license.org/) © Junior Grossi