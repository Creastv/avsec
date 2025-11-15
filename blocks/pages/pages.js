document.addEventListener("DOMContentLoaded", function () {
    let loadMoreBtn = document.getElementById("load-more-team");
    let teamList = document.getElementById("team-list");

    if (!loadMoreBtn || !teamList) return; // Zabezpieczenie przed błędami

    function fetchMorePosts() {
        let page = parseInt(loadMoreBtn.getAttribute("data-page-team")) || 1;

        let xhr = new XMLHttpRequest();
        xhr.open("POST", ajax_params.ajaxurl, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);

                if (response.posts.trim() === "") {
                    loadMoreBtn.style.display = "none";
                } else {
                    teamList.insertAdjacentHTML("beforeend", response.posts);
                    loadMoreBtn.setAttribute("data-page-team", page + 1);
                }

                if (response.has_more === "false") {
                    loadMoreBtn.style.display = "none";
                } else {
                    loadMoreBtn.style.display = "flex";
                }
            }
        };

        let params = "action=load_more_team&page=" + page; // Akcja zgodna z PHP
        xhr.send(params);
    }

    loadMoreBtn.addEventListener("click", function () {
        fetchMorePosts();
    });
});
