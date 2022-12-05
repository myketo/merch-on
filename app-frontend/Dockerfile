FROM node:18-alpine

WORKDIR /usr/src/app

COPY package*.json .

RUN apk update \
    && apk upgrade \
    && npm install \
    && npm cache clean --force

ENV NUXT_HOST=0.0.0.0
ENV NUXT_PORT=3000
ENV PATH ./node_modules/.bin/:$PATH

COPY --chown=www:www . .

EXPOSE 3000
EXPOSE 24678

CMD ["npm", "run", "dev"]