const houseInfo = [];
const houseVotes = {};
function updateFields() {
    console.log(houseInfo);
    console.log(houseVotes);
    houseInfo.forEach(house => {
        console.log(houseVotes[house.id]);
        console.log(houseVotes.total);
        const votes = houseVotes[house.id] || 0;
        const percentage = Math.round(votes/houseVotes.total*100);
        const element = document.getElementById(house.id);
        element.value = percentage + '% ' + house.name + '!';
        element.disabled = true;
    });
}