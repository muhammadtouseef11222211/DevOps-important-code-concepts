# Use an official OpenJDK runtime as a parent image
FROM openjdk:21-jdk-slim

# Set the working directory inside the container
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY SimpleHttpServer.java /app/SimpleHttpServer.java

# Compile the Java program
RUN javac SimpleHttpServer.java

# Make port 8000 available to the world outside this container
EXPOSE 8000

# Run the Java application
CMD ["java", "SimpleHttpServer"]
