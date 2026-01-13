FROM node:24

WORKDIR /app
COPY mobile/package*.json ./
RUN npm install

COPY frontend/. ./

EXPOSE 3000
CMD ["npm", "start"]
