# DWA-15 P3: Laravel Basics / Developer's Best Friend

## Live URL
<http://p3.hriggs.me>

## Description
The Project 3 Developer's Best Friend site is for the class CSCI E-15: Dynamic Web Applications. 
This site includes 3 tools. First, a tool to generate a random number of paragraphs of lorem ipsum 
text (with optional other types of text). Second, a tool to generate random user data; this includes
the user's name and optionally an address, phone number, e-mail, birthday, and profile lorem ipsum 
blurb. Finally, it contains a tool that generates a xkcd password with various options such as 
symbols and numbers distributed throughout or at the end of the password. 

## Demo
<https://youtu.be/ebpvuwCu9vw>
* Again, so sorry for the white noise in the background of the demo! 

## Details for teaching team
Challenges I chose to implement:
* Extra lorem ipsum options: ability to specify paragraph length and add text types such as headers, lists, and links
* Extra user data options: ability show extra user data such as address, birthday, and e-mail
* xkcd password generator code incorporated into app
* Forms that are sticky when submitted via POST and forms that reset when page loaded via GET
* Validation for user input
* Responsive design (including responsive navigation bar) and styling via Bootstrap and media queries

## Outside code
* laravel-lipsum (lorem ipsum) package: <https://github.com/magyarjeti/loripsum-client>
* Faker (user data) package: <https://github.com/fzaninotto/Faker>
* Bootstrap: <http://getbootstrap.com/>
* Tentacle icon: <https://icons8.com/>
* Password image: <http://xkcd.com/license.html>
* English word list: <http://www-01.sil.org/linguistics/wordlists/english/>