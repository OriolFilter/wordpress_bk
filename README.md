# Teabag 

The idea behind the page, is to provide a centralized  web that contains information about tea, talking about its
properties and history, while allowing users to comment on it and engage a discussion/debate with each others.  

 > List of all things done

- Wodrpess webside using dockers
    - mysql
    - apache-wordpress
  
### Template
- https://pe.wordpress.org/themes/baskerville/

### Widgeds
- Added a widged at the bottom A
  - Consists in an embeded youtube video about the tea history.

### Additional CSS
- Made the posts clear-green-semitransparent to go along the page

### Replaced the Background Image for a custom one
### Replaced the Header Image for a custom one (will be randomly selected from a list of uploaded headers)

### Updated the title of the page 

### Replaced the title for an image, but later reverted the changes back

### Set up a page .ico for the browsers.

### Users added
- root:a  (root)
- admin:a (subscriber)
- admin_b:a (subscriber)
- author:a (author)
- contributor:a (contributor)
- rooteditor:a (editor)
- test:a (contributor)

### Enabled everyoen can register


### Added a home menu
- Location: Primary Menu
- Contains:
  - The history of tea (post)
  - tea facts (category)
  - tea history (category)
  
###### The passwords are simple to facilitate debugging, but once developing production ends, it's important to update its values, the next page can be used for that.
- https://passwordsgenerator.net 

### Contact forms created
- Tea form
  - Simple form
  - Sends result to email
  
### Pages created
- EARLY DISCUSSIONS ABOUT TEA AND HEALTH
- TEA SMUGGLING AND TAXATION
- TEA TRADING AND CONSUMPTION
- THE BIRTH OF TEA IN CHINA
- THE GROWTH OF TEA IN EUROPE
- The History of Tea
- Tea time (hosts the contact form created)

### Images added 
- total of  8

### Categories created
- tea facts
- tea history

### Posts created
- THE ROOTS OF TEA IN BRITAIN  (tea history)
- TEA TRADING AND CONSUMPTION (tea facts)
- TEA SMUGGLING AND TAXATION (tea facts)
- 5 Health Benefits of Rooibos Tea (tea facts)


### Dasboard
- Removed certain items from the view
- Moved certain items to make it more confortable

### Plugins installed
- Akismet Anti-Spam
- Classic Editor
- Contact Form 7
- Gutenberg
- Health Check & Troubleshooting
- Really Simple SSL
- Tea Bag plugin (custom plugin)

### Custom plugin

```injectablephp
<?php
/**
 * Plugin Name: Tea Bag plugin
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: My tea bag plugin, the results depend of the hour, at 17h from UK, it will return the tea form-post
 * created, if it's not 17h in the UK, will recommend a random post from the last 5 created.
 * Version: 0.1
 * Author: Oriol Filter
 * Author URI: teabag.con
 */

add_action( 'the_content', 'random_post' );

function random_post ( $content ) {
    if (date('H') == 17-1) {
        return $content .= "<p>Since it's teatime in the UK, you might want to check <a href=\"/?page_id=40\">this:</a>";
    }

    $my_posts = get_posts( array( 'author' => 1 ) );
    $id='';
    while (!$id) {
        $n=random_int ( 0 , count($my_posts) );
        $id = $my_posts[$n]->ID;
    }
    return $content .="Since it's not tea hour, you might want to check this  <a href='/?page_id=$id'>post!</a>";
}
```
###### Needs to do 17-1, due date returning the universal time (UTC)

### Since its done using dockers, it's easy to set up volume backups. 
### "updated the password", yet it was replaced to "a", due development applications, but can be easily replaced again.