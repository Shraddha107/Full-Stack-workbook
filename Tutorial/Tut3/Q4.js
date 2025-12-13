function wakeUp() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      const wokeUp = true;

      if (wokeUp) {
        resolve("You woke up");
      } else {
        reject("You DIDN'T woke up");
      }
    }, 500);
  });
}

function walkDog() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      const dogWalked = true;

      if (dogWalked) {
        resolve("You walk the dog");
      } else {
        reject("You DIDN'T walk the dog");
      }
    }, 1500);
  });
}

function cleanKitchen() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      const kitchenCleaned = true;

      if (kitchenCleaned) {
        resolve("You clean the kitchen");
      } else {
        reject("You DIDN'T clean the kitchen");
      }
    }, 2500);
  });
}

function takeOutTrash() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      const trashTakenOut = false;

      if (trashTakenOut) {
        resolve("You take out the trash");
      } else {
        reject("You DIDN'T take out the trash");
      }
    }, 500);
  });
}

wakeUp()
   .then((value) => {
    console.log(value);
    return walkDog();
  }) 
  .then((value) => {
    console.log(value);
    return cleanKitchen();
  })
  .then((value) => {
    console.log(value);
    return takeOutTrash();
  })
  .then((value) => {
    console.log(value);
    console.log("You finished all the chores!");
  })
  .catch((error) => console.error(error));