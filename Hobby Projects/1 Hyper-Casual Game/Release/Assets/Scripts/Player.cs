using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Player : MonoBehaviour
{
    GameManager gameManager;
    public float accel = 0.2f;
    public float speed = 2f;

    float moveX = 0;
    float moveY = 0;
    float prevTouchX;
    float prevTouchY;

    void Awake()
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
    }

    void Update()
    {
//         if (Input.touchCount > 0)
//         {
//             Touch touch = Input.GetTouch(0);
            
//             if (Input.touches[0].phase == TouchPhase.Began)
//             {
//                 prevTouchX = touch.position.x;
//                 prevTouchY = touch.position.y;
//             }
//             else if (Input.touches[0].phase == TouchPhase.Ended)
//             {
//                 if (touch.position.x - prevTouchX > 0 && touch.position.y - prevTouchY > 0)
//                 {
//                     // top right
//                     moveX = speed;
//                     moveY = speed;
//                 }
//                 else if (touch.position.x - prevTouchX > 0 && touch.position.y - prevTouchY < 0)
//                 {
//                     // bottom right
//                     moveX = speed;
//                     moveY = -speed;
//                 }
//                 else if (touch.position.x - prevTouchX < 0 && touch.position.y - prevTouchX > 0)
//                 {
//                     // top left
//                     moveX = -speed;
//                     moveY = speed;
//                 }
//                 else if (touch.position.x - prevTouchX < 0 && touch.position.y - prevTouchY < 0)
//                 {
//                     // bottom left
//                     moveX = -speed;
//                     moveY = -speed;
//                 }
//             }
//         }

// #if UNITY_EDITOR
            if (Input.GetMouseButtonDown(0))
            {
                prevTouchX = Input.mousePosition.x;
                prevTouchY = Input.mousePosition.y;
            }
            else if (Input.GetMouseButtonUp(0))
            {
                if (Input.mousePosition.x - prevTouchX > 0 && Input.mousePosition.y - prevTouchY > 0)
                {
                    // top right
                    moveX = speed;
                    moveY = speed;
                }
                else if (Input.mousePosition.x - prevTouchX > 0 && Input.mousePosition.y - prevTouchY < 0)
                {
                    // bottom right
                    moveX = speed;
                    moveY = -speed;
                }
                else if (Input.mousePosition.x - prevTouchX < 0 && Input.mousePosition.y - prevTouchX > 0)
                {
                    // top left
                    moveX = -speed;
                    moveY = speed;
                }
                else if (Input.mousePosition.x - prevTouchX < 0 && Input.mousePosition.y - prevTouchY < 0)
                {
                    // bottom left
                    moveX = -speed;
                    moveY = -speed;
                }
            }
// #endif

        float x = moveX * Time.deltaTime;
        float y = moveY * Time.deltaTime;
        transform.Translate(new Vector2(x,y));

        checkGameOver();
    }

    void OnTriggerEnter2D(Collider2D obj)
    {
        gameManager.newItemLoc();
        gameManager.incrementScore();
    }

    void checkGameOver()
    {
        Vector2 screenPoint = Camera.main.WorldToViewportPoint(transform.position);
        bool onScreen = screenPoint.x > 0 && screenPoint.x < 1 && screenPoint.y > 0 && screenPoint.y < 1;

        if (!onScreen)
            gameManager.gameOver();
    }
}
