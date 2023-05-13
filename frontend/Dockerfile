FROM node:14.4-alpine

WORKDIR /app/frontend

COPY package*.json ./

RUN npm install

COPY . .

EXPOSE 8080

CMD ["sh", "-c", "npm install && npm run serve"]

# CMD ["sh", "-c", "npm run serve"]
