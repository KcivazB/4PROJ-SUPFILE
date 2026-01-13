import { View, TouchableOpacity, StyleSheet, Text } from 'react-native';
import { useRouter, usePathname } from 'expo-router';
import { Ionicons } from '@expo/vector-icons';
import { Colors } from '@/constants/Colors';
import MaterialIcons from '@expo/vector-icons/MaterialIcons';
import AntDesign from '@expo/vector-icons/AntDesign';
import FontAwesome5 from '@expo/vector-icons/FontAwesome5';

export default function NavBar() {
  const router = useRouter();
  const pathname = usePathname();

  const isActive = (path: string) => pathname === path;

  return (
    <View style={styles.container}>
      <TouchableOpacity 
        style={[styles.navItem, isActive('/pages/dashboard') && styles.activeNavItem]}
        onPress={() => router.push('/pages/dashboard')}
      >
        <MaterialIcons 
          name="dashboard" 
          size={isActive('/pages/dashboard') ? 28.8 : 24} 
          color={isActive('/pages/dashboard') ? Colors.light.color_8 : Colors.light.color_9} 
        />
        <Text style={[
          styles.navText, 
          { 
            color: isActive('/pages/dashboard') ? Colors.light.color_8 : Colors.light.color_9,
            fontSize: isActive('/pages/dashboard') ? 14.4 : 12,
          }
        ]}>
          Accueil
        </Text>
        {isActive('/pages/dashboard') && <View style={styles.activeIndicator} />}
      </TouchableOpacity>

      <TouchableOpacity 
        style={[styles.navItem, isActive('/pages/my-space') && styles.activeNavItem]}
        onPress={() => router.push('/pages/my-space')}
      >
        <AntDesign 
          name="folder" 
          size={isActive('/pages/my-space') ? 28.8 : 24} 
          color={isActive('/pages/my-space') ? Colors.light.color_8 : Colors.light.color_9} 
        />
        <Text style={[
          styles.navText, 
          { 
            color: isActive('/pages/my-space') ? Colors.light.color_8 : Colors.light.color_9,
            fontSize: isActive('/pages/my-space') ? 14.4 : 12,
          }
        ]}>
          Espace
        </Text>
        {isActive('/pages/my-space') && <View style={styles.activeIndicator} />}
      </TouchableOpacity>

      <TouchableOpacity 
        style={[styles.navItem, isActive('/pages/shared') && styles.activeNavItem]}
        onPress={() => router.push('/pages/shared')}
      >
        <Ionicons 
          name="people" 
          size={isActive('/pages/shared') ? 28.8 : 24} 
          color={isActive('/pages/shared') ? Colors.light.color_8 : Colors.light.color_9} 
        />
        <Text style={[
          styles.navText, 
          { 
            color: isActive('/pages/shared') ? Colors.light.color_8 : Colors.light.color_9,
            fontSize: isActive('/pages/shared') ? 14.4 : 12,
          }
        ]}>
          Partages
        </Text>
        {isActive('/pages/shared') && <View style={styles.activeIndicator} />}
      </TouchableOpacity>

      <TouchableOpacity 
        style={[styles.navItem, isActive('/pages/trash') && styles.activeNavItem]}
        onPress={() => router.push('/pages/trash')}
      >
        <FontAwesome5 
          name="trash" 
          size={isActive('/pages/trash') ? 28.8 : 24} 
          color={isActive('/pages/trash') ? Colors.light.color_8 : Colors.light.color_9} 
        />
        <Text style={[
          styles.navText, 
          { 
            color: isActive('/pages/trash') ? Colors.light.color_8 : Colors.light.color_9,
            fontSize: isActive('/pages/trash') ? 14.4 : 12,
          }
        ]}>
          Corbeille
        </Text>
        {isActive('/pages/trash') && <View style={styles.activeIndicator} />}
      </TouchableOpacity>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flexDirection: 'row',
    backgroundColor: Colors.light.color_6,
    borderTopWidth: 1,
    borderTopColor: Colors.light.color_4,
    borderLeftWidth: 1,
    borderRightWidth: 1,
    borderColor: Colors.light.color_4,
    paddingVertical: 10,
    paddingBottom: 20,
    justifyContent: 'space-around',
    alignItems: 'flex-end',
    borderTopLeftRadius: 20,
    borderTopRightRadius: 20,
    height: 110,
  },
  navItem: {
    flex: 1,
    alignItems: 'center',
    paddingVertical: 8,
  },
  activeNavItem: {
    transform: [{ scale: 1 }],
  },
  navText: {
    fontSize: 12,
    marginTop: 4,
    fontWeight: '500',
  },
  activeIndicator: {
    width: 60,
    height: 3,
    backgroundColor: Colors.light.color_8,
    borderRadius: 3,
    marginTop: 4,
    shadowColor: '#000',
    shadowOffset: {
      width: 0,
      height: 2,
    },
    shadowOpacity: 0.25,
    shadowRadius: 3.84,
    elevation: 2,
  },
});
