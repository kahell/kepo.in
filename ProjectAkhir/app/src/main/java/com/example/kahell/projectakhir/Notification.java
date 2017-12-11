package com.example.kahell.projectakhir;

import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.media.RingtoneManager;
import android.net.Uri;
import android.support.v4.app.NotificationCompat;

/**
 * Created by eknoshaa on 06/12/2017.
 */

public class Notification extends BroadcastReceiver {

    @Override
    public void onReceive(Context context, Intent intent) {
        //Define Notification Manager
        NotificationManager notificationManager = (NotificationManager) context.getSystemService(Context.NOTIFICATION_SERVICE);

        //Define sound URI
        Uri soundUri = RingtoneManager.getDefaultUri(RingtoneManager.TYPE_ALARM);

        Intent repeating_intent = new Intent(context, Kepo.class);
        repeating_intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);

        PendingIntent pendingIntent = PendingIntent.getActivity(context, 100, repeating_intent, PendingIntent.FLAG_UPDATE_CURRENT);

        //Expanding Notification
        NotificationCompat.Builder builder = new NotificationCompat.Builder(context)
                .setContentIntent(pendingIntent)
                .setSmallIcon(R.drawable.kepo_in)
                .setContentTitle("KEPO.IN")
                .setContentText("Tap to view")
                .setSound(soundUri)
                .setStyle(new NotificationCompat.BigTextStyle())
                .setAutoCancel(true);
        notificationManager.notify(100, builder.build());
    }

}
