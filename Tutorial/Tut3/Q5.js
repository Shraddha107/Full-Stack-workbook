function wakeUp() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      const wokeUp = false;

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
      const dogWalked = false; // change to false to test error

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
      const kitchenCleaned = false; // change to false to test error

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
      const trashTakenOut = false; // change to false to test error

      if (trashTakenOut) {
        resolve("You take out the trash");
      } else {
        reject("You DIDN'T take out the trash");
      }
    }, 500);
  });
}

async function doChores() {
  try {
    const wakeUpResult = await wakeUp();
    console.log(wakeUpResult);

    const walkDogResult = await walkDog();
    console.log(walkDogResult);

    const cleanKitchenResult = await cleanKitchen();
    console.log(cleanKitchenResult);

    const takeOutTrashResult = await takeOutTrash();
    console.log(takeOutTrashResult);

    console.log("You finished all the chores!");
  } catch (error) {
    console.error(error);
  }
}

doChores();