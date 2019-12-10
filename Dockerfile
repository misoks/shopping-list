# Derived from official mysql image (our base image)
FROM mysql:5.7

# Add a database
ENV MYSQL_DATABASE company

# Add the content of the sql-scripts/ directory to your image
# All scripts in docker-entrypoint-initdb.d/ are automatically
# executed during container startup
COPY ./_setup/createtables.sql /docker-entrypoint-initdb.d/
