FROM node:24

WORKDIR /app

# Copier uniquement les fichiers nécessaires au cache
COPY package*.json ./

RUN npm install

# Copier le reste du frontend
COPY . .

EXPOSE 3000

CMD ["npm", "start"]
