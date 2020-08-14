const {Router} = require('express')
const Cliente = require("./models/cliente")
const routes = Router()

routes.post("/clientes", async (req, res) => {
  //validar campos
  const {nome,cpf,rg,nasc,cep,rua,bairro,cidade,estado,numero } = req.body
  //instanciar classe cpf e passar por parâmetro o cpf para validar
  console.log(req.body)
  const cliente = await Cliente.create({
        nome,
        cpf,
        rg,
        nasc,
        cep,
        rua,
        bairro,
        cidade,
        estado,
        numero 
  })
  return res.json(req.body)
})

routes.get("/clientes", async (req, res) => {
  const clientes = await Cliente.findAll()
  return res.json(clientes)
})

routes.put("/clientes/:id", async (req,res) =>{
  //const cliente = await Cliente.findByPk(req.body.id)
  const {nome,cpf,rg,nasc,cep,rua,bairro,cidade,estado,numero } = req.body
  console.log(req.body)
  const cliente = await Cliente.findByPk(req.body.id)
  cliente.nome = nome
  cliente.cpf = cpf
  cliente.rg = rg
  cliente.nasc = nasc
  cliente.cep = cep
  cliente.rua = rua
  cliente.bairro = bairro
  cliente.cidade = cidade
  cliente.estado = estado
  cliente.numero = numero

  cliente.save()
  return res.json(req.body)
})

routes.delete("/clientes/:id", async (req,res) =>{
  const cliente = await Cliente.findByPk(req.body.id)
  cliente.destroy()
})

routes.get("/clientes/:id", (req, res) => {})
routes.put("/clientes/:id", (req, res) => {})
routes.delete("/clientes/:id", (req, res) => {})




module.exports = routes