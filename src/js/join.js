window.onload = function(e) {
  const cvs = document.getElementById("code_cvs");
  const ctx = cvs.getContext("2d");
  const emailText = document.getElementById("validateEmail");
  let code = "qwertyuiopasdfghjklzxcvbnm";
  code += code.toUpperCase();
  code += "0123456789";

  ctx.fillStyle = "#fff";
  ctx.fillRect(0,0,cvs.width,cvs.height);

  const codeSet = Array(6).fill(0)
                          .map(() => ~~(Math.random() * code.length))
                          .map(index => code[index])
                          .join('');

  ctx.fillStyle = "#333";
  ctx.font = "40px Arial";
  ctx.textBaseline = "middle";
  ctx.textAlign = "center";
  ctx.fillText(codeSet,150,25,300);


  const submit = document.getElementById("join_form");
  submit.addEventListener("submit", async function(e) {
    event.preventDefault();
    emailText.style.display = "none";
    const { target } = e;
    const isAllInput = [ ...target.querySelectorAll('[name]') ].filter(v => v.value.trim() === '').length;
    if(isAllInput) {
      return alert("모든 입력창을 채워주세요.");
    }

    if(target.id.value.match(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[0-9a-zA-Z]{2,3}$/i) === null) {
      return alert("이메일 형식이 잘못되었습니다.");
    }
    if(target.pass.value.match(/^[0-9a-zA-Z]+|[!@#$%^&*()]+$/) == null) {
      return alert("비밀번호 형식이 잘못되었습니다.");
    }

    if(target.pass.value != target.pass_check.value) {
      return alert("비밀번호와 비밀번호 체크가 다릅니다.");
    }

    if(target.name.value.match(/^[가-힣a-zA-Z]{2,10}$/) == null) {
      return alert("이름 형식이 잘못되었습니다.");
    }

    if(target.birth.value.match(/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/) == null) {
      return alert("생일 형식이 잘못되었습니다.");
    }else {
      if(!validate(target.birth.value)) return alert("생일 형식이 잘못되었습니다.");
    }

    // const ext = target.profile.value.replace(/.*\.(.*)/, '$1').toLowerCase();
    // if( !["jpg","png","gif"].includes(ext) ) {
    //   return alert("이미지 파일은 jpg, png, gif 파일만 업로드 가능합니다.");
    // }

    if(target.code.value != codeSet) {
      return alert("캡차 문구가 일치하지 않습니다.");
    }

    const isSuccess = await validateEmail(target.id.value);

    if(!isSuccess) {
      emailText.style.display = "block";
      return false;
    }

    target.submit();

  })

  function validateEmail(email) {

    const formData = new FormData();
    formData.append("id", email);

    const option = {
      method: "post",
      body: formData
    }

    return fetch("/email-check", option)
              .then(res => res.json())
              .then(({ success }) => success);
  }

  function validate(date) {

    const birthday = new Date(date);
    const [year, month, day] = date.split('-').map(Number)
    const y = birthday.getFullYear();
    const m = birthday.getMonth() + 1;
    const d = birthday.getDate();

    return date.toString() !== 'Invalid Date' &&
           Date.now() > birthday.getTime() &&
           year >= 1920 && 
           year === y &&
           month === m &&
           day === d;
  }
}