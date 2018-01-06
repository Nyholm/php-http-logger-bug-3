FROM nexylan/php-dev:7.1-alpine

RUN npm install -g pm2

COPY entrypoint.sh /
RUN chmod u+x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

WORKDIR /code

CMD ["tail", "-f", "/dev/null"]
