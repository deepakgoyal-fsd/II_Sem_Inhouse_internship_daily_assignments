const db_s = [
    { n: "Mayank Sharma", r: "25ESKCS219", b: "CSE", y: "2nd Year", c: "B.Tech" },
    { n: "Mridul Soni", r: "24ESKCS002", b: "CSE", y: "2nd Year", c: "B.Tech" },
    { n: "Pulkit Sharma", r: "24ESKCS003", b: "IT", y: "2nd Year", c: "B.Tech" },
    { n: "Sameer Rajkumhawat", r: "24ESKCS004", b: "ECE", y: "2nd Year", c: "B.Tech" },
    { n: "Nilaksh Yadav", r: "24ESKCS005", b: "CSE", y: "2nd Year", c: "B.Tech" },
    { n: "Nish Jajoo", r: "24ESKCS006", b: "ME", y: "2nd Year", c: "B.Tech" },
    { n: "Madhavi Sharma", r: "24ESKCS007", b: "Civil", y: "2nd Year", c: "B.Tech" },
    { n: "Parth Mathur", r: "24ESKCS008", b: "IT", y: "2nd Year", c: "B.Tech" },
    { n: "Mayank Saini", r: "24ESKCS009", b: "CSE", y: "2nd Year", c: "B.Tech" },
    { n: "Lakshya Rajvaniya", r: "24ESKCS010", b: "ECE", y: "2nd Year", c: "B.Tech" },
    { n: "Nisha Panghal", r: "24ESKCS012", b: "ECE", y: "2nd Year", c: "B.Tech" },
    { n: "Mayabk Pancholi", r: "24ESKCS012", b: "ECE", y: "2nd Year", c: "B.Tech" },
    { n: "Kunal Dhar", r: "24ESKCS013", b: "ECE", y: "2nd Year", c: "B.Tech" },
    { n: "Lokit Vashishtha", r: "24ESKCS014", b: "ECE", y: "2nd Year", c: "B.Tech" },
    { n: "Manish Gurjar", r: "24ESKCS015", b: "ECE", y: "2nd Year", c: "B.Tech" }
];

function rnd_all() {
    let bx = document.getElementById("d_cnt");
    bx.innerHTML = "";
    document.getElementById("msg_x").innerHTML = "";
    document.getElementById("n_ct").innerHTML = db_s.length;

    let h = "";
    for (let i = 0; i < db_s.length; i++) {
        h += `
        <div style="background:#ffffff; border-radius:8px; padding:22px; width:280px; box-shadow:0 6px 15px rgba(0,0,0,0.08); border-top:4px solid #3b82f6; color:#1e293b;">
            <h2 style="color:#2563eb; font-size:20px; margin-bottom:12px;">${db_s[i].n}</h2>
            <p style="margin-bottom:8px;"><b>Roll No:</b> ${db_s[i].r}</p>
            <p style="margin-bottom:8px;"><b>Branch:</b> ${db_s[i].b}</p>
            <p style="margin-bottom:8px;"><b>Year:</b> ${db_s[i].y}</p>
            <p style="margin-bottom:0;"><b>Course:</b> ${db_s[i].c}</p>
        </div>
        `;
    }
    bx.innerHTML = h;
}

function f_src() {
    let q = document.getElementById("s_in").value.trim();
    let bx = document.getElementById("d_cnt");
    let m = document.getElementById("msg_x");

    bx.innerHTML = "";
    m.innerHTML = "";

    if (q === "") {
        rnd_all();
        return;
    }

    let ok = false;
    let h = "";

    for (let i = 0; i < db_s.length; i++) {
        if (db_s[i].n.toLowerCase().includes(q.toLowerCase())) {
            h += `
            <div style="background:#ffffff; border-radius:8px; padding:22px; width:280px; box-shadow:0 6px 15px rgba(0,0,0,0.08); border-top:4px solid #3b82f6; color:#1e293b;">
                <h2 style="color:#2563eb; font-size:20px; margin-bottom:12px;">${db_s[i].n}</h2>
                <p style="margin-bottom:8px;"><b>Roll No:</b> ${db_s[i].r}</p>
                <p style="margin-bottom:8px;"><b>Branch:</b> ${db_s[i].b}</p>
                <p style="margin-bottom:8px;"><b>Year:</b> ${db_s[i].y}</p>
                <p style="margin-bottom:0;"><b>Course:</b> ${db_s[i].c}</p>
            </div>
            `;
            ok = true;
        }
    }

    bx.innerHTML = h;

    if (!ok) {
        m.innerHTML = "Student is not in the college.";
    }
}

function f_rst() {
    document.getElementById("s_in").value = "";
    document.getElementById("msg_x").innerHTML = "";
    rnd_all();
}

function t_dm() {
    document.body.classList.toggle("d_thm");
    let t = document.getElementById("m_tg");

    if (document.body.classList.contains("d_thm")) {
        t.innerHTML = "☀️ Light Mode";
    } else {
        t.innerHTML = "🌙 Dark Mode";
    }
}

rnd_all();