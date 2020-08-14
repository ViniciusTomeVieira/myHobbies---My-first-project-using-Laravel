module.exports = {
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
};