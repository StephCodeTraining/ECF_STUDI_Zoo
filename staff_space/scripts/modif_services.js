let mdfSrvc1 = document.getElementById("mdf_srvc_1");
let ctnrDesc1 = document.getElementById("ctnr_desc1");
let mdfSrvc2 = document.getElementById("mdf_srvc_2");
let ctnrDesc2 = document.getElementById("ctnr_desc2");
let mdfSrvc3 = document.getElementById("mdf_srvc_3");
let ctnrDesc3 = document.getElementById("ctnr_desc3");

mdfSrvc1.addEventListener("click", () => {
  if (ctnrDesc1.style.display == "block") {
    ctnrDesc1.style.display = "none";
  } else ctnrDesc1.style.display = "block";
});
mdfSrvc2.addEventListener("click", () => {
  if (ctnrDesc2.style.display == "block") {
    ctnrDesc2.style.display = "none";
  } else ctnrDesc2.style.display = "block";
});
mdfSrvc3.addEventListener("click", () => {
  if (ctnrDesc3.style.display == "block") {
    ctnrDesc3.style.display = "none";
  } else ctnrDesc3.style.display = "block";
});
