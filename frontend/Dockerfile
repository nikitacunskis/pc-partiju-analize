# web/frontend/Dockerfile

FROM node:20-alpine

RUN npm install -g http-server

WORKDIR /app
COPY ./public .

EXPOSE 80
CMD ["http-server", ".", "-p", "80"]