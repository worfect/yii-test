FROM nginx:1.21-alpine

RUN apk add --no-cache curl

COPY ./nginx/snippets /etc/nginx/snippets
COPY ./nginx/conf.d /etc/nginx/conf.d

WORKDIR /app
