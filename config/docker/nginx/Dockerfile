ARG TAG

FROM coworkees/app:$TAG as app

FROM nginx:1.15-alpine

ADD config/swarm/nginx /etc/nginx

COPY --from=app /scripts/web /scripts/web

CMD ["/etc/nginx/init.sh"]
