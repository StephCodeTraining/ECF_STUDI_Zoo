const divDesc = document.getElementsByClassName("animal_desc");

// const modalAnimal = document.getElementById("animalModal");
const btnDesc = document.getElementById("openAnimalModal");
const spanDesc = document.getElementsByClassName("closeBtn")[0];

function display_desc(nom) {
  let name = nom;
  let desc = document.getElementById("infos_" + name);

  if (desc.style.display == "block") {
    desc.style.display = "none";
  } else {
    desc.style.display = "block";
  }
}
