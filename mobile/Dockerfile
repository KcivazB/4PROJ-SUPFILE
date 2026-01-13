FROM node:24

WORKDIR /app

# Copy only the package.json
COPY package*.json ./

# Install dependencies
RUN npm install -g expo-cli && npm install

# Copy the whole mobile code
COPY . .

EXPOSE 19000
CMD ["expo", "start", "--tunnel"]
