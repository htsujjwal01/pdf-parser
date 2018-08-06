# pdf-parser

# Hello Everyone,

# Below are the steps to run this module on your system:

# 1) First clone the project on your local machine and then create .env file from .env.example.

# 2) After that run "composer install" in the project directory, in order to fetch all the dependencies required to run the project.

# 3) After that you have to run "npm install" so as to fetch the node modules required for the project.

# 4) After completing the above steps run "npm run development" so as to build the scss and js for the application.

# 5) Once you have done the above steps then create a database with name "pdfparser" and run "php artisan migrate" to create the tables for the application.

# 6) After that you have to seed the users table for that you have to run "php artisan db:seed" in order to seed the data in the users table.

# 7) Once the basic setup has completed, then hit the url and log in to the application with the seeded data.

# 8) Once you have logged into the system, upload your pdf files and once they are uploaded they would be inserted into the queue for parsing and you will get the successful message that they have been successfully uploaded in the system and below you will get the list of pdf's uploaded in the system.

# 9) So now the files have been uploaded and are in the queue, therefore now you have to run "php artisan queue:work" in order to eecute the queue.

# 10) Once all the files from the queue has been executed, you can use the below API's to the PDF according to their id, pages or by the text present as content in the PDF's.

# 11) First API :- Get PDF by id, showing all pages in JSON
        http://{app_domain}/api/pdf/{pdf_id}

# 12) Second API :- Show specific page of PDF in JSON
		http://{app_domain}/api/pdf/{pdf_id}/{page_no}

# 13) Third API :- Search a word inside all PDF data and get back the result
		http://{app_domain}/api/pdf-text-search/{search}

Therefore, application is completed.