
# 📄 README.md

```markdown
# 🚀 Laravel ChatGPT 간단 설치 가이드

이 프로젝트는 Plesk Laravel Toolkit을 사용하는 SWS 웹호스팅 고객을 위한  
**초간단 ChatGPT 연동 예제**입니다.

Laravel 설치부터 OpenAI 연결까지 한 번에 완료할 수 있습니다. 🧠⚡

---

## 📹 설치 및 사용 방법 영상



👉 유튜브에서 전체 설치 과정을 확인하세요!  
🔗 https://youtu.be/kQNidupZ0c8
---

## 📋 설치 요약

### 1. Laravel 설치
- Plesk 관리자 페이지 로그인
- **Laravel Toolkit** → **Install Application** → **Install Skeleton** 선택
- 도메인 선택 후 설치

### 2. OpenAI PHP 클라이언트 설치
```bash
composer require openai-php/client openai-php/laravel
```

### 3. 필요한 파일 작성
- `routes/web.php`  
- `app/Http/Controllers/ChatController.php`
- `resources/views/chat.blade.php`

> 각 파일은 본 저장소를 참고해 주세요.

### 4. .env 파일 수정
```dotenv
OPENAI_API_KEY=your-openai-api-key
```

🔒 **반드시 유효한 OpenAI API 키를 입력해야 정상 작동합니다.**

---

## 🌐 데모 사이트

완성된 예시는 여기에서 확인할 수 있습니다:  
🔗 [https://chat.shop2world.net/](https://chat.shop2world.net/)

---

## 🛠️ 요구 사항

- PHP 8.1 이상
- Laravel 10 이상
- 유효한 OpenAI API 키

---

## 📄 라이선스

MIT License

---

## 🙌 제작
- Shop2World Web Service (SWS)



