const { Sequelize } = require('sequelize');

const Cliente = require("../models/cliente")

class Database {
  constructor() {
    this.init();
  }

  init() {
    this.connection = new Sequelize({
      dialect: 'postgres',
      host: "localhost",
      username: "postgres",
      password: "postgres",
      database: "clientes",
      port: '5432',
      define: {
        timestamps: true,
        underscored: true,
        underscoredAll: false,
      },
    })
    Cliente.init(this.connection);
  }

}

module.exports = new Database()