# Setup live datasets tracker site.
Note - on the ssd-website server you can use `sudo rsub name-of-file` to open the remote file within sublime text on your computer. Might be useful when editing the nginx server block. 

    - sublime text must already be running
    - Check you have installed the "rsub" package in Sublime (ctrl-shift-p, list packages - search for "rsub". If you don't have it, install it).


1. Within /var/www, create a new folder called "datasets". 
2. Copy the contents of the staging site folder into "datasets".
3. Update the .env file:
    - change the app url (I've setup `datasets.stats4sd.org` for the live site)
    - database name (please call the database "datasets")
    - and azure redirect uri.
4. Create the new database in MySQL. (The root password is in the .env file)
5. Run the migrations to populate the new database.

6. Create nginx server block (in the file /etc/nginx/sites-available/default)
    + Copy the staging datasets block
    + update the domain and the root.
        * I've setup `datasets.stats4sd.org` to point to the server. Please use this as the app url. 
7. Create a new SSL certificate with Certbot: `sudo certbot --nginx -d datasets.stats4sd.org`. 
    - When it asks if you want to redirect insecure traffic, say yes. This will update the nginx file with the redirect, so everyone will automatically use https:// rather than http://

Check if the site is available.

I think that's all that's needed!


