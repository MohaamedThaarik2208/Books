
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title> Bookss </title>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #ede9fe, #fce7f3);
    color: #29213f;
}

/* Header alignment */
header {
    background: linear-gradient(135deg, #5424a8, #8128a8);
    color: white;
    text-align: center;
    padding: 30px 15px;
}

header h1 {
    margin: 0 0 10px;
    font-size: 32px;
}

header p {
    margin: 0;
}

/* Main container */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 30px auto;
}

/* Search bar alignment */
.search-box {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    padding: 22px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px #00000012;
}

input,
select,
button {
    padding: 13px 15px;
    border: 1px solid #d8c9ed;
    border-radius: 8px;
    font-size: 15px;
}

input {
    flex: 1;
    min-width: 200px;
}

select {
    min-width: 180px;
    background: white;
}

button {
    background: #5424a8;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
}

button:hover {
    background: #381477;
}

/* Status alignment */
#status {
    margin: 25px 0;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    color: #5424a8;
}

/* Book card alignment */
#books {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 24px;
    align-items: stretch;
}

/* Individual book card */
.book {
    background: white;
    border-radius: 14px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 5px 18px #00000012;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-width: 0;
    transition: transform 0.2s;
}

.book:hover {
    transform: translateY(-5px);
}

/* Equal book cover area */
.book img {
    width: 140px;
    height: 180px;
    object-fit: contain;
    margin-bottom: 12px;
}

/* Consistent title height */
.book h3 {
    width: 100%;
    min-height: 42px;
    margin: 8px 0;
    font-size: 17px;
    line-height: 1.4;
    overflow-wrap: anywhere;
}

/* Author and category */
.book p {
    width: 100%;
    min-height: 20px;
    color: #666;
    font-size: 14px;
    line-height: 1.5;
    margin: 6px 0;
}

/* Align buttons at the bottom */
.book button {
    width: 100%;
    margin-top: auto;
    min-height: 42px;
}

/* Popup alignment */
#modal {
    display: none;
    position: fixed;
    inset: 0;
    background: #0009;
    justify-content: center;
    align-items: center;
    padding: 20px;
    z-index: 100;
}

.modal-content {
    width: 100%;
    max-width: 500px;
    max-height: 85vh;
    overflow-y: auto;
    background: white;
    padding: 25px;
    border-radius: 15px;
    line-height: 1.6;
}

.close {
    float: right;
    background: #d93852;
}

/* Footer */
footer {
    text-align: center;
    padding: 25px;
    color: #666;
}

/* Tablet */
@media (max-width: 1000px) {
    #books {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

/* Small tablet */
@media (max-width: 750px) {
    #books {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

/* Mobile */
@media (max-width: 500px) {
    .container {
        width: 94%;
    }

    .search-box {
        flex-direction: column;
    }

    .search-box input,
    .search-box select,
    .search-box button {
        width: 100%;
    }

    #books {
        grid-template-columns: 1fr;
    }

    header h1 {
        font-size: 25px;
    }
}
</style>
</head>

<body>

<header>
    <h1>📚 Interactive Bookss </h1>
    <p>Discover books and explore their authors</p>
</header>

<main class="container">

    <div class="search-box">
        <input
            type="text"
            id="search"
            placeholder="Search title or author..."
        >

        <select id="category">
            <option value="all">All Categories</option>
            <option value="Programming">Programming</option>
            <option value="Technology">Technology</option>
            <option value="Science">Science</option>
            <option value="Novel">Novel</option>
            <option value="Management">Management</option>
        </select>

        <button id="searchBtn">🔍 Search Books</button>
        <button id="showAll">Show All Books</button>
    </div>

    <div id="status">Loading books...</div>
    <section id="books"></section>

</main>

<div id="modal">
    <div class="modal-content">
        <button class="close" id="closeModal">Close ✖</button>
        <div id="details"></div>
    </div>
</div>

<footer>
     jQuery AJAX and Hypothetical API
</footer>

<script>

const hypotheticalAPI = {
    "books": [
        {
            "id": 1,
            "title": "Learning Python",
            "author": "Mark Lutz",
            "category": "Programming",
            "year": 2013,
            "description": "A beginner-friendly guide to Python programming.",
            "cover": "https://placehold.co/140x180/ede9fe/5424a8?text=Python"
        },
        {
            "id": 2,
            "title": "Java Programming",
            "author": "Herbert Schildt",
            "category": "Programming",
            "year": 2020,
            "description": "Learn Java syntax, object-oriented programming and concepts.",
            "cover": "https://placehold.co/140x180/dcfce7/166534?text=Java"
        },
        {
            "id": 3,
            "title": "Clean Code",
            "author": "Robert C. Martin",
            "category": "Programming",
            "year": 2008,
            "description": "Principles for writing readable and maintainable code.",
            "cover": "https://placehold.co/140x180/e5e7eb/111827?text=Clean+Code"
        },
        {
            "id": 4,
            "title": "Introduction to Algorithms",
            "author": "Thomas H. Cormen",
            "category": "Technology",
            "year": 2022,
            "description": "An introduction to algorithms and problem-solving techniques.",
            "cover": "https://placehold.co/140x180/fee2e2/991b1b?text=Algorithms"
        },
        {
            "id": 5,
            "title": "Computer Networks",
            "author": "Andrew S. Tanenbaum",
            "category": "Technology",
            "year": 2011,
            "description": "Learn about network architecture, protocols and communication.",
            "cover": "https://placehold.co/140x180/ccfbf1/115e59?text=Networks"
        },
        {
            "id": 6,
            "title": "Operating Systems",
            "author": "Abraham Silberschatz",
            "category": "Technology",
            "year": 2018,
            "description": "Explore processes, memory management and operating systems.",
            "cover": "https://placehold.co/140x180/f3e8ff/6b21a8?text=Operating+Systems"
        },
        {
            "id": 7,
            "title": "Database Management Systems",
            "author": "Raghu Ramakrishnan",
            "category": "Technology",
            "year": 2014,
            "description": "Understand database design, SQL and data management.",
            "cover": "https://placehold.co/140x180/e0e7ff/3730a3?text=Database"
        },
        {
            "id": 8,
            "title": "Artificial Intelligence",
            "author": "Stuart Russell",
            "category": "Technology",
            "year": 2021,
            "description": "An introduction to intelligent systems and AI.",
            "cover": "https://placehold.co/140x180/dbeafe/1d4ed8?text=AI"
        },
        {
            "id": 9,
            "title": "Machine Learning",
            "author": "Ethem Alpaydin",
            "category": "Technology",
            "year": 2020,
            "description": "Explore machine learning methods and applications.",
            "cover": "https://placehold.co/140x180/d1fae5/065f46?text=Machine+Learning"
        },
        {
            "id": 10,
            "title": "A Brief History of Time",
            "author": "Stephen Hawking",
            "category": "Science",
            "year": 1988,
            "description": "An introduction to space, time and the universe.",
            "cover": "https://placehold.co/140x180/fef3c7/92400e?text=Space+and+Time"
        },
        {
            "id": 11,
            "title": "The Time Machine",
            "author": "H. G. Wells",
            "category": "Novel",
            "year": 1895,
            "description": "A classic science-fiction story about time travel.",
            "cover": "https://placehold.co/140x180/ffedd5/9a3412?text=Time+Machine"
        },
        {
            "id": 12,
            "title": "Pride and Prejudice",
            "author": "Jane Austen",
            "category": "Novel",
            "year": 1813,
            "description": "A classic novel about relationships and social expectations.",
            "cover": "https://placehold.co/140x180/fce7f3/9d174d?text=Pride+and+Prejudice"
        },
        {
            "id": 13,
            "title": "The Great Gatsby",
            "author": "F. Scott Fitzgerald",
            "category": "Novel",
            "year": 1925,
            "description": "A classic novel set in the Jazz Age.",
            "cover": "https://placehold.co/140x180/fef9c3/854d0e?text=The+Great+Gatsby"
        },
        {
            "id": 14,
            "title": "Principles of Management",
            "author": "Harold Koontz",
            "category": "Management",
            "year": 2010,
            "description": "An introduction to management principles and practices.",
            "cover": "https://placehold.co/140x180/e0f2fe/075985?text=Management"
        },
        {
            "id": 15,
            "title": "The Art of Innovation",
            "author": "Tom Kelley",
            "category": "Management",
            "year": 2001,
            "description": "Ideas and approaches for creative problem-solving.",
            "cover": "https://placehold.co/140x180/f3e8ff/7e22ce?text=Innovation"
        }
    ]
};


function fetchBooks() {
    $("#status").text("Fetching books using jQuery AJAX...");

    // Convert hypothetical JSON into a Blob URL,
    // then request it through AJAX.
    const jsonBlob = new Blob(
        [JSON.stringify(hypotheticalAPI)],
        { type: "application/json" }
    );

    const apiURL = URL.createObjectURL(jsonBlob);

    $.ajax({
        url: apiURL,
        method: "GET",
        dataType: "json",

        success: function(response) {
            displayBooks(response.books);
        },

        error: function() {
            $("#status").text("Unable to load sample books.");
        },

        complete: function() {
            URL.revokeObjectURL(apiURL);
        }
    });
}


function displayBooks(bookList) {
    const container = $("#books");
    container.empty();

    if (!bookList || bookList.length === 0) {
        $("#status").text("No books found. Try another search.");
        return;
    }

    $("#status").text("Found " + bookList.length + " books.");

    bookList.forEach(function(book) {
        const card = $("<article>").addClass("book");

        $("<img>")
            .attr("src", book.cover)
            .attr("alt", book.title)
            .appendTo(card);

        $("<h3>").text(book.title).appendTo(card);

        $("<p>")
            .text("Author: " + book.author)
            .appendTo(card);

        $("<p>")
            .text("Category: " + book.category)
            .appendTo(card);

        $("<button>")
            .text("View Details")
            .on("click", function() {
                showDetails(book);
            })
            .appendTo(card);

        container.append(card);
    });
}


function showDetails(book) {
    const details = $("#details");
    details.empty();

    $("<h2>").text(book.title).appendTo(details);

    $("<p>")
        .text("Author: " + book.author)
        .appendTo(details);

    $("<p>")
        .text("Category: " + book.category)
        .appendTo(details);

    $("<p>")
        .text("Published Year: " + book.year)
        .appendTo(details);

    $("<p>")
        .text("Description: " + book.description)
        .appendTo(details);

    $("#modal").css("display", "flex");
}


function searchBooks() {
    const searchText = $("#search").val().toLowerCase().trim();
    const category = $("#category").val();

    const filteredBooks = hypotheticalAPI.books.filter(function(book) {
        const matchesText =
            book.title.toLowerCase().includes(searchText) ||
            book.author.toLowerCase().includes(searchText) ||
            book.category.toLowerCase().includes(searchText);

        const matchesCategory =
            category === "all" || book.category === category;

        return matchesText && matchesCategory;
    });

    displayBooks(filteredBooks);
}

$("#searchBtn").on("click", searchBooks);

$("#search").on("keydown", function(event) {
    if (event.key === "Enter") {
        searchBooks();
    }
});

$("#category").on("change", searchBooks);

$("#showAll").on("click", function() {
    $("#search").val("");
    $("#category").val("all");
    displayBooks(hypotheticalAPI.books);
});

$("#closeModal").on("click", function() {
    $("#modal").hide();
});

$("#modal").on("click", function(event) {
    if (event.target === this) {
        $("#modal").hide();
    }
});

// Load all 15 sample books when page opens
$(document).ready(function() {
    fetchBooks();
});
</script>

</body>
</html>
