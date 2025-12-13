function hello(callback) {
  console.log("Hello!");
  callback();
}

function goodbye() {
  console.log("Goodbye!");
}

function goodmorning() {
  console.log("Goodmorning!");
}

hello(goodmorning);

hello(goodbye);

// asynchronous example:
const loadPokemon = (id, cb) => {
  fetch(`https://pokeapi.co/api/v2/pokemon/${id}`)
    .then((res) => res.json())
    .then((data) => {
      cb(data);
    });
};

loadPokemon(56, (pokemon) => {
  console.log(pokemon);
});