export default {
  setup() {
    const id = +document.getElementsByClassName('lesson')[0].dataset.id;

    const sendNotificationLesson = async () => {
        const data = {
          id: id
        }
        try {
          const response = await fetch('/lesson/looked/'+id, {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
            },
            // body: JSON.stringify(data),
          });

          const response_data = await response.json(); 
          if (response_data == 302) {
            window.location.href = window.location.origin + '/site/login'; // выполняем редирект
          } else {
            window.location.href = window.location.origin + '/lessons';
          }

          console.log(response_data);
        } catch (error) {
          console.log(error);
        }
      }
      return {
        id,
        sendNotificationLesson,
      };
    },

    template: `<button type="button" class="btn btn-primary" @click='sendNotificationLesson'>Урок просмотрен</button>`
}
