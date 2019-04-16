# Stop current kobo-nginx
cd /opt/kobo-docker
docker-compose stop nginx

# Renew certificates
certbot renew

cp /etc/letsencrypt/live/example.com/fullchain.pem /opt/kobo-docker/secrets/ssl.crt
cp /etc/letsencrypt/live/example.com/privkey.pem /opt/kobo-docker/secrets/ssl.key

# Start kobo-nginx again
docker-compose up -d