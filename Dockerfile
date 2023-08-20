# Use the official NGINX image as the base image
FROM nginx

# Copy the index.html file into the default web server directory
COPY index.html /usr/share/nginx/html/
