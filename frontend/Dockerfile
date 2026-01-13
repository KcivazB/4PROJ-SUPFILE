# Base Node
FROM node:24

WORKDIR /app

# Installer create-react-app globalement
RUN npm install -g create-react-app

WORKDIR /app/frontend

# Copy the whole frontend code
COPY . .

EXPOSE 3000

# Commande pour lancer le dev server
CMD ["npm", "start"]
