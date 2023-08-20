# Use the official NGINX image as the base image
FROM nginx



# Copy the index.html file into the default web server directory
COPY *.html /usr/share/nginx/html/
COPY assets /usr/share/nginx/html/assets

