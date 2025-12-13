function wakeUp(callback) {
  setTimeout(() => {
    console.log("You woke up");
    callback();
  }, 500);
}

function walkDog(callback) {
  setTimeout(() => {
    console.log("You walk the dog");
    callback();
  }, 1500);
}

function cleanKitchen(callback) {
  setTimeout(() => {
    console.log("You clean the kitchen");
    callback();
  }, 2500);
}

function takeOutTrash(callback) {
  setTimeout(() => {
    console.log("You take out the trash");
    callback();
  }, 500);
}

wakeUp(() => {
    walkDog(() => {
        cleanKitchen(() => {
            takeOutTrash(() => {
                console.log("You finished all the chores!");
            });
        });
    });
});