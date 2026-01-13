# Base Node
FROM node:24

WORKDIR /app

RUN npm install 
WORKDIR /app/frontend

# Copy the whole frontend code
COPY . .

EXPOSE 3000

# Commande pour lancer le dev server
CMD ["npm", "start"]
